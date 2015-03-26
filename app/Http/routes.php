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
Route::Get('addproperty', 'EmarketController@addproperty');
Route::POST('addproperty', 'EmarketController@addpropertypost');
Route::POST('executeSearch', array('uses' => 'EmarketController@executeSearch'));

Route::get('home', 'HomeController@index');


Route::POST('auth/login', function(){
	$userdata = array(
		'email' => Input::get('email'),
		'password' => Input::get('password')
		);

	if(Auth::attempt($userdata)){	
		return Redirect::to('/');
	}else
		echo'Not Successfull';
});

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
