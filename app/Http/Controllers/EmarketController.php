<?php namespace App\Http\Controllers;

use App\User;
use Eloquent;
use App\Property;
use App\Phone;
use App\Product;
use App\Review;
use App\Computer;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Auth;
use Redirect;
use App\Comment;
use View;
use Validator;
use Input;



class EmarketController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{	
		$products = Product::orderBy('views', 'desc')->take(15)->get();

		return view('emarket.index')->with('products', $products);
	}

	public function userview($user){
		$userData = User::where('id', $user)->first();
		$activeProducts = Product::orderBy('views', 'desc')->where('sold', 0)->where('userId', $user)->take(4)->get();
		$inactiveProducts = Product::orderBy('views', 'desc')->where('sold', 1)->where('userId', $user)->take(4)->get();
		$reviews = Review::join('users', 'users.id', '=', 'reviews.fromUser')->where('toUser', $user)->get();
		return view('emarket.user')->with('user', $userData)->with('inactiveProducts', $inactiveProducts)->with('activeProducts', $activeProducts)->with('reviews', $reviews);
	}

	public function productview($product){
		
		$productType = Product::where('id', $product)->first();
		Product::where('id', $product)->update(array('views' => $productType->views+1));
		$comments = User::join('comments', 'users.id', '=', 'comments.userId' )->where('productId', $product)->get();
		
		switch ($productType->type) {
			case '0':
				$joinResult = Product::join('properties', 'properties.productId', '=', 'products.id')->where('id', $product)->first();
				return view('emarket.propertyview')->with('product', $joinResult)->with('comments', $comments);
				break;

			case '1':
				$joinResult = Product::join('phones', 'phones.productId', '=', 'products.id')->where('id', $product)->first();
				return view('emarket.phoneview')->with('product', $joinResult)->with('comments', $comments);
				break;

			case '2':
				$joinResult = Product::join('computers', 'computers.productId', '=', 'products.id')->where('id', $product)->first();
				return view('emarket.computerview')->with('product', $joinResult)->with('comments', $comments);
				break;

			default:
				return 'product nor found';
				break;
		}
	}

	public function inputHas($name){
		if(Request::has($name))
			return $name = 1;
		else 
			return $name = 0;
	}

	public function addComment(){
		$title = Input::get('title');
		$productId = Input::get('productId');
		$content = Input::get('content');
		
		$validationComment = Comment::validate(Input::all());

		if($validationComment->fails())
			return 'error';
		else{
		$commentData = array(
				'userId' => Auth::user()->id,
				'productId' => Input::get('productId'),
				'title' =>Input::get('title'),
				'content' =>Input::get('content'),
			);
			$comment = new Comment($commentData);
			$comment->save();

			return "<p>$title comment was added</p>";
		}

	}

	public function addReview(){

		$content = Input::get('content');
		$userId = Input::get('toUser');
		$grade = Input::get('grade');

		$validationReview = Review::validate(Input::all());

		if($validationReview->fails())
			return 'error';
		else{
		$reviewData = array(
				'fromUser' => Auth::user()->id,
				'toUser' => Input::get('toUser'),
				'content' =>Input::get('content'),
				'grade' =>Input::get('grade'),
			);
			$review = new Review($reviewData);
			$review->save();

			return "Successfully added review";
		}
	}


	public function addproduct(){
		return view('emarket.addproduct');
	}

	public function addproductpost(){

	$validation = Product::validate(Input::all());

	if ($validation->fails()) {
		//with_input saves already saved data
		return Redirect::to('addproduct')->withErrors($validation)->withInput();
	}else{


	if(Request::has('pictures')){
	$file = Input::file('pictures');
	$destinationPath = base_path().'/public/img';
	$filename = $file->getClientOriginalName();
	$realPath = $destinationPath.$filename;
	Input::file('pictures')->move($destinationPath, $filename);
	}

	$productData = array(
			'name' => Request::get('name'),
			'userId' => Auth::user()->id,
			'price' =>Request::get('price'),
			'stock' => Request::get('stock'),
			'isItNew' =>$this->inputHas('isItNew'),
			'moneyRetreive' =>$this->inputHas('moneyRetreive'),
			'shortDesc' => Request::get('shortDescription'),
			 #'pictures' => base_path().'/public/img'.Request::file('pictures')->getClientOriginalName(),
			'longDesc' => Request::get('longDescription'),
		);
		$product = new Product($productData);
		$product->save();

		return Redirect::to('/');
	}
}
	public function addproperty(){
		return view('emarket.addproperty');
	}

	public function addpropertypost(){

	$images = Input::file('pictures');

		if(!is_array($images))
			$images = array($images);

	foreach ($images as $image) {
			$validator = Validator::make(
            array('file' => $image),
            array('file' => 'required|image|max:1000'));
	}
	
	$validationProperty = Property::validate(Input::all());
	$validation = Product::validate(Input::all());

	if ($validation->fails()) {
		//with_input saves already saved data
		return Redirect::to('addproduct')->withErrors($validation)->withInput();
	}else if($validationProperty->fails()){
		return Redirect::to('addproduct')->withErrors($validationProperty)->withInput();
	}else if($validator->fails()){
			return Redirect::to('addproduct')->withErrors($validator)->withInput();
	}
	else{		
			$this->storeProduct(0);
			$findId = Product::where('name', Request::get('name'))->first();
			$productId = $findId->id;


		$propertyData = array(
				'productId' => $productId,
				'floor' => Request::get('floor'),
				'rooms' =>Request::get('rooms'),
				'stock' => Request::get('stock'),
				'squareMeters' =>Request::get('squareMeters'),
				'internet' =>$this->inputHas('internet'),
				'furniture' =>$this->inputHas('furniture'),
				'telephone' =>$this->inputHas('telephone'),
				'water' =>$this->inputHas('water'),
				'cableTv' =>$this->inputHas('cableTv'),
				'garden' =>$this->inputHas('garden'),
				'airConditioning' =>$this->inputHas('airConditioning'),
				'parking' =>$this->inputHas('parking'),
				'fence' =>$this->inputHas('fence'),
				'latitude' =>Request::get('latitude'),
				'longitude' =>Request::get('longitude'),
				/*floor rooms  internet furniture telephone water cableTv garden
				 airConditioning parking fence*/
			);

			$property = new Property($propertyData);
			$property->save();

			return Redirect::to('/');
		}
	}

	public function executeSearch(){

		$keywords = Input::get('keywords');
		$products = Product::all();

		$foundProducts = new \Illuminate\Database\Eloquent\Collection();

		foreach ($products as $product) {
			if(Str::contains(Str::lower($product->name), Str::lower($keywords))){
				$foundProducts->add($product);
			}
		}
		return View::make('emarket.foundproducts')->with('foundProducts', $foundProducts);
	}

	public function addphone(){
		return view('emarket.addphone');
	}

	public function addcomputer(){
		return view('emarket.addcomputer');
	}

	public function addphonepost(){
		
		$images = Input::file('pictures');

		if(!is_array($images))
			$images = array($images);

		foreach ($images as $image) {
			$validator = Validator::make(
            array('file' => $image),
            array('file' => 'required|image|max:1000'));
		}

		$validationProperty = Phone::validate(Input::all());
		$validation = Product::validate(Input::all());

		if ($validation->fails()) {
			//with_input saves already saved data
			return Redirect::to('addphone')->withErrors($validation)->withInput();
		}else if($validationProperty->fails()){
			return Redirect::to('addphone')->withErrors($validationProperty)->withInput();
		}else if($validator->fails()){
			return Redirect::to('addphone')->withErrors($validator)->withInput();
		}else{

			$this->storeProduct(1);

			$findId = Product::where('name', Request::get('name'))->first();
			$productId = $findId->id;

			$propertyData = array(
				'productId' => $productId,
				'color' => Request::get('color'),
				'screenResolution' => Request::get('screenResolution'),
				'camera' =>Request::get('camera'),
				'processor' =>Request::get('processor'),
				'frontCamera' =>Request::get('frontCamera'),
				'os' =>Request::get('os'),
				'model' =>Request::get('model'),
				'ram' =>Request::get('ram'),
				'flash' =>$this->inputHas('flash'),
				'wireless' =>$this->inputHas('wireless'),
				'bluetooth' =>$this->inputHas('bluetooth'),
				'headset' =>$this->inputHas('headset'),

				//'latitude' =>Request::get('latitude'),
				//'longitude' =>Request::get('longitude'),
				/*floor rooms  internet furniture telephone water cableTv garden
				 airConditioning parking fence*/
			);

			$phone = new Phone($propertyData);
			$phone->save();

			return Redirect::to('/');

		}
	}

	//need to adapt for compute
	public function addcomputerpost(){

		$images = Input::file('pictures');

		if(!is_array($images))
			$images = array($images);

		foreach ($images as $image) {
			$validator = Validator::make(
            array('file' => $image),
            array('file' => 'required|image|max:1000'));
		}

		$validationComputer = Computer::validate(Input::all());
		$validation = Product::validate(Input::all());

		if ($validation->fails()) {
			//with_input saves already saved data
			return Redirect::to('addproduct')->withErrors($validation)->withInput();
		}else if($validationComputer->fails()){
			return Redirect::to('addproduct')->withErrors($validationComputer)->withInput();
		}else if($validator->fails()){
			return Redirect::to('addproduct')->withErrors($validator)->withInput();
		}else{

			$this->storeProduct(2);

			$findId = Product::where('name', Request::get('name'))->first();
			$productId = $findId->id;

			$computerData = array(
				'productId' => $productId,

				'brand' => Request::get('brand'),
				'productFamily' => Request::get('productFamily'),
				'processorType' =>Request::get('processorType'),
				'processorSpeed' =>Request::get('processorSpeed'),
				'numberCores' =>Request::get('numberCores'),
				'screenSize' =>Request::get('screenSize'),
				'os' =>Request::get('os'),
				'ram' =>Request::get('ram'),
				'hdd' =>Request::get('hdd'),
				'ssd' =>Request::get('ssd'),
				
				
				'wireless' =>$this->inputHas('wireless'),
				'bluetooth' =>$this->inputHas('bluetooth'),
				'webcam' =>$this->inputHas('webcam'),
				'microphone' =>$this->inputHas('microphone'),
				'cdRom' =>$this->inputHas('cdRom'),
				'hdmi' =>$this->inputHas('hdmi'),
				'bag' =>$this->inputHas('bag'),

				//'latitude' =>Request::get('latitude'),
				//'longitude' =>Request::get('longitude'),
				/*floor rooms  internet furniture telephone water cableTv garden
				 airConditioning parking fence*/
			);

			$computer = new Computer($computerData);
			$computer->save();

			return Redirect::to('/');

		}
	}

	public function storeProduct($type){

			$picturesName = " ";
			
			$files = Input::file('pictures');
			if(!is_array($files))
				$files = array($files);

			foreach ($files as $file) {
				$destinationPath = base_path().'/public/img';
				$filename = $file->getClientOriginalName();
				$file->move($destinationPath, $filename);
				global $picturesName;
				$picturesName = $picturesName.base_path().'/public/img/'.$filename;
			}



		$productData = array(
				'type' => $type,
				'name' => Request::get('name'),
				'userId' => Auth::user()->id,
				'price' =>Request::get('price'),
				'stock' => Request::get('stock'),
				'isItNew' =>$this->inputHas('isItNew'),
				'moneyRetreive' =>$this->inputHas('moneyRetreive'),
				'shortDesc' => Request::get('shortDescription'),
				'pictures' => $picturesName,
				'longDesc' => Request::get('longDescription'),
				/*floor rooms kmFromCityCenter internet furniture telephone water cableTv garden airConditioning parking fence*/

			);

			$product = new Product($productData);
			$product->save();
	}

	public function index2($category){
		$products = Product::orderBy('views', 'desc')->where('type', $category)->take(10)->get();
		return view('emarket.index')->with('products', $products);
	}
}