<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Validator;

class Comment extends Eloquent{

	protected $fillable = ['userId', 'productId', 'parentPost', 'title', 'content', 'date'];

	public $timestamps = false;

	public static $rules = array(
		'parentPost'=> 'integer',
		'title' => 'string',
		'content' =>'string',
		'productId' => 'integer',
	);

	public static function validate ($data){
		return Validator::make($data, static::$rules);
	}
}