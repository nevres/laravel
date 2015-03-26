<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::create('properties', function(Blueprint $table)
		{
			$table->integer('productId')->unsigned();
			$table->integer('squareMeters');
			$table->integer('floor');
			$table->integer('rooms');
			$table->boolean('fence')->default(false);
			$table->boolean('internet')->default(false);
			$table->boolean('furniture')->default(false);
			$table->boolean('telephone')->default(false);
			$table->boolean('water')->default(false);
			$table->boolean('cableTv')->default(false);
			$table->boolean('garden')->default(false);
			$table->boolean('airConditioning')->default(false);
			$table->boolean('parking')->default(false);
			$table->foreign('productId')->references('id')->on('products');
			$table->double('latitude')->default('43.8551771');
			$table->double('longitude')->default('18.4138047');

		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('properties');
	}

}
