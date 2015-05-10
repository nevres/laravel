<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('animals', function(Blueprint $table)
		{
			$table->integer('productId')->unsigned();
			
			$table->string('breed');
			$table->integer('age');
			$table->boolean('gender');

			$table->boolean('vaccine')->default(false);
			$table->boolean('pedigree')->default(false);
			$table->boolean('puppy')->default(false);
			$table->boolean('pureblood')->default(false);

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
		Schema::drop('animals');
	}

}
