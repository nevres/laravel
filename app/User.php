<?php namespace App;

use Validator;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;


class User extends Model implements AuthenticatableContract, CanResetPasswordContract
 {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'first_name', 'second_name', 'profilePicture'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


	public static $rules = array(
		'name' => 'required | min:3',
		'first_name'=> 'required| min:3',
		'profilePicture' => 'image | max:1000',
		'password' => 'required',
		'email' => 'required',
		'password_confirmation' => 'required|same:password',
	);

	public static function validate ($data){
		return Validator::make($data, static::$rules);
	}
}
