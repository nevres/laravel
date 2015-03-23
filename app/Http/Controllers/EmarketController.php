<?php namespace App\Http\Controllers;

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

		if(Input::get('isItNew') === 'yes')
			 	$isItNew = true;
			 else
			 	$isItNew = false;

			 	if(Input::has('moneyRetrieve'))
			 	$moneyRetrieve =true;
			 else
			 	$moneyRetrieve=false;

		$productData = array(
			'name' => Input::get('productName'),
			'price' =>Input::get('price'),
		    'grade' => 0,
		    'views' => 0,
			 $isItNew,
			 $moneyRetrieve,
			'stock' => Input::get('stock'),
			'shortDescription' => Input::get('shortDescription'),
			'longDescription' => Input::get('longDescription'),
		);

		$product = new Product($productData);
		$product->save();

		return Redirect::to('/');
	}
}
