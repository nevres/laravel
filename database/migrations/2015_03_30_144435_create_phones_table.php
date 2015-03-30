<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhonesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{	
		Schema::create('phones', function(Blueprint $table)
		{
			$table->integer('productId')->unsigned();
			$table->foreign('productId')->references('id')->on('products');
			$table->string('color');
			$table->integer('screenResolution');
			$table->integer('camera');
			$table->float('processor');
			$table->integer('frontCamera');
			$table->string('os');
			$table->string('model');
			$table->integer('ram');
			$table->boolean('flash')->default(false);
			$table->boolean('wireless')->default(false);
			$table->boolean('bluetooth')->default(false);
			$table->boolean('headset')->default(false);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('phones');
	}

}
