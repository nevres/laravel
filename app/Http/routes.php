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

Route::POST('addproduct', 'EmarketController@addproductpost');
Route::GET('addproduct', 'EmarketController@addproduct');

Route::Get('addproperty', 'EmarketController@addproperty');
Route::POST('addproperty', 'EmarketController@addpropertypost');
Route::GET('addphone', 'EmarketController@addphone');
Route::POST('addphone', 'EmarketController@addphonepost');
Route::GET('addcomputer', 'EmarketController@addcomputer');
Route::POST('addcomputer', 'EmarketController@addcomputerpost');

Route::get('/', 'EmarketController@index');
Route::get('/{category}', ['uses' =>'EmarketController@index2']);
Route::get('product/{product}', ['as' => 'product', 'uses' => 'EmarketController@productview']);

Route::get('user/{user}', ['as' => 'user', 'uses' => 'EmarketController@userview']);
Route::get('language/{language}', ['as' => 'language', 'uses' => 'EmarketController@changeLanguage']);

Route::POST('executeSearch', array('uses' => 'EmarketController@executeSearch'));
Route::POST('addComment', array('uses' => 'EmarketController@addComment'));
Route::POST('addReview', array('uses' => 'EmarketController@addReview'));
Route::POST('processFilter', array('uses' => 'EmarketController@processFilter'));

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

	$validation = User::validate(Input::all());


	if ($validation->fails())
		return Redirect::to('auth/register')->withErrors($validation)->withInput();
			
		if(Request::has('picture')) {
				return 'asfd';
				$file = Input::file('picture');
				$destinationPath = base_path().'/public/img';
				$filename = str_random(6).'_'.$file->getClientOriginalName();
				$file->move($destinationPath, $filename);
				$picturesName = $picturesName.base_path().'/public/img/'.$filename;
			}

			
		$userdata = array(
			'name' => Input::get('name'),
			'first_name' =>Input::get('first_name'),
			'email' => Input::get('email'),
			'second_name' => Input::get('second_name'),
			'password' => Hash::make(Input::get('password')),
			'profilePicture' => $picturesName,
		);

	$user = new User($userdata);
	$user->save();

	return Redirect::to('/');
	
});

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
