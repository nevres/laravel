<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComputersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('computers', function(Blueprint $table)
		{
			$table->integer('productId')->unsigned();
			
			$table->string('brand');
			$table->string('productFamily');

			$table->timestamp('productionDate')->default(DB::raw('CURRENT_TIMESTAMP'));

			$table->string('processorType');
			$table->integer('processorSpeed');
			$table->integer('numberCores');
			$table->integer('screenSize');
			$table->string('os');

			$table->integer('Ram');
			$table->integer('hdd');
			$table->integer('ssd');

			$table->boolean('bluetooth')->default(false);
			$table->boolean('wireless')->default(false);
			$table->boolean('cdRom')->default(false);
			$table->boolean('microphone')->default(false);
			$table->boolean('webcam')->default(false);
			$table->boolean('hdmi')->default(false);
			$table->boolean('bag')->default(false);

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
		Schema::drop('computers');
	}

}
