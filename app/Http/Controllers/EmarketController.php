<?php namespace App\Http\Controllers;

use App\User;
use App\Product;
use Illuminate\Support\Facades\Request;
use Auth;
use Redirect;
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

	public function addproduct(){
		return view('emarket.addproduct');
	}

	public function addproductpost(){

	$validation = Product::validate(Input::all());

	if ($validation->fails()) {
		//with_input saves already saved data
		return Redirect::to('addproduct')->withErrors($validation)->withInput();
	}else{

	if(Request::has('isItNew')){
		$isItNew = 1;
	}else{
		$isItNew = 0;}

	if(Request::has('moneyRetreive')){
		$moneyRetreive = 1;
	}else{
		$moneyRetreive = 0;}

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
			'isItNew' =>$isItNew,
			'moneyRetreive' =>$moneyRetreive,
			'shortDesc' => Request::get('shortDescription'),
			'pictures' => base_path().'/public/img'.Request::file('pictures')->getClientOriginalName(),
			'longDesc' => Request::get('longDescription'),
		);
		$product = new Product($productData);
		$product->save();

		return Redirect::to('/');

	}
}
}
