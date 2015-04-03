<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Validator;

class Product extends Eloquent{
	protected $fillable = ['id', 'userId', 'name','shortDesc', 'longDesc', 'price', 'grade','stock', 'isItNew', 'date', 'moneyRetreive', 'shordDesc', 'longdesc', 'grade', 'pictures', 'type' ];
	public $timestamps = false;

	public static $rules = array(
		'name' => 'required | min:3',
		'price'=> 'required | integer',
		 #'pictures' => 'image | max:1000',
		'stock' => 'required'
	);

	public static function validate ($data){
		return Validator::make($data, static::$rules);
	}
}