<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Validator;

class Phone extends Eloquent{

	protected $fillable = ['productId', 'color', 'screenResolution','camera', 'processor', 'frontCamera', 'os',
	'model', 'ram', 'flash', 'wireless', 'bluetooth', 'headset', 'latitude', 'longitude'];

	public $timestamps = false;

	public static $rules = array(
		'model' => 'required|string',
		'camera'=> 'integer',
		'color' => 'string',
		'screenResolution' =>'integer',
		'processor' => 'integer',
		'frontCamera' =>'integer',
		'os' => 'string',
		'ram' =>'integer',
	);

	public static function validate ($data){
		return Validator::make($data, static::$rules);
	}
}