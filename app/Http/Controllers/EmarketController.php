<?php namespace App\Http\Controllers;

use App\User;
use Eloquent;
use App\Property;
use App\Product;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;
use Auth;
use Redirect;
use View;
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
		return view('emarket.index');
	}

	public function inputHas($name){
		if(Request::has($name))
			return $name = 1;
		else 
			return $name = 0;
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
	
	$validationProperty = Property::validate(Input::all());
	$validation = Product::validate(Input::all());

	if ($validation->fails()) {
		//with_input saves already saved data
		return Redirect::to('addproperty')->withErrors($validation)->withInput();
	}else if($validationProperty->fails()){
		return Redirect::to('addproperty')->withErrors($validationProperty)->withInput();
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
				'pictures' => base_path().'/public/img'.Request::file('pictures')->getClientOriginalName(),
				'longDesc' => Request::get('longDescription'),
				/*floor rooms kmFromCityCenter internet furniture telephone water cableTv garden airConditioning parking fence*/

			);

			$product = new Product($productData);
			$product->save();



		$propertyData = array(
				'type' => 0,
				'productId' => 1,
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
}