<?php

use App\User;
use App\Product;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
*/

Route::get('/', 'EmarketController@index');
Route::POST('addproduct', 'EmarketController@addproductpost');
Route::GET('addproduct', 'EmarketController@addproduct');
Route::get('home', 'HomeController@index');


/*Route::POST('auth/login', function(){
	$userdata = array(
		'email' => Input::get('email'),
		'password' => Input::get('password')
		);

	if(Auth::attempt($userdata)){	
		return Redirect::to('/');
	}else
		echo'Not Successfull';
});

	Route::POST('addproduct', function(){

	if(Input::has('isItNew')){
		$isItNew = 1;
	}else{
		$isItNew = 0;}

	if(Input::has('moneyRetreive')){
		$moneyRetreive = 1;
	}else{
		$moneyRetreive = 0;}

	
	$file = Input::file('pictures');
	$destinationPath = base_path().'/public/img';
	$filename = $file->getClientOriginalName();
	$realPath = $destinationPath.$filename;
	Input::file('pictures')->move($destinationPath, $filename);
	

	$productData = array(
			'name' => Input::get('name'),
			'userId' => Auth::user()->id,
			'price' =>Input::get('price'),
			'stock' => Input::get('stock'),
			'isItNew' =>$isItNew,
			'moneyRetreive' =>$moneyRetreive,
			'shortDesc' => Input::get('shortDescription'),
			'pictures' => base_path().'/public/img'.Input::file('pictures')->getClientOriginalName(),
			'longDesc' => Input::get('longDescription'),
		);
		$product = new Product($productData);
		$product->save();

		return Redirect::to('/');
});

*/

Route::POST('auth/register', function(){
	$userdata = array(
			'name' => Input::get('name'),
			'first_name' =>Input::get('first_name'),
			'email' => Input::get('email'),
			'second_name' => Input::get('second_name'),
			'password' => Hash::make(Input::get('password'))
		);

	$user = new User($userdata);
	$user->save();

	return Redirect::to('/');
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
