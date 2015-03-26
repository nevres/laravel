<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Validator;

class Property extends Eloquent{

	protected $fillable = ['productId', 'squeareMeteers', 'floor','rooms', 'fence', 'internet', 'furniture',
	'telephone', 'water', 'cableTv', 'garden', 'airConditioning', 'parking', 'latitude', 'longitude'];
	

	public $timestamps = false;

	public static $rules = array(
		'squareMeters' => 'required|integer',
		'floor'=> 'integer',
		'room' => 'integer',
		'kmFromCity' =>'integer',
	);

	public static function validate ($data){
		return Validator::make($data, static::$rules);
	}
}