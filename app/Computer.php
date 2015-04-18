<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Validator;

class Computer extends Eloquent{
	protected $fillable = ['brand', 'productFamily', 'productionDate','processorType', 'processorSpeed', 'numberCores', 'screenSize','os', 'Ram', 'hdd', 'ssd', 'bluetooth', 'wireless', 'cdRom', 'microphone', 'webcam','hdmi', 'bag', 'latitude', 'longitude', 'productId'];

	public $timestamps = false;

	public static $rules = array(
		'brand' => 'required | min:3',
		'productFamily'=> 'required | string',
		'processorType' => 'string',
		'processorSpeed'=> 'integer',
		'numberCores' => 'integer',
		'screenSize'=> 'integer',
		'os' => 'string',
	);

	public static function validate ($data){
		return Validator::make($data, static::$rules);
	}
}