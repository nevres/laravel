<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Validator;

class Review extends Eloquent{

	protected $fillable = ['id', 'fromUser', 'toUser', 'content', 'date', 'grade'];

	public $timestamps = false;

	public static $rules = array(
		'content'=> 'string|min:5',
	);

	public static function validate ($data){
		return Validator::make($data, static::$rules);
	}
}