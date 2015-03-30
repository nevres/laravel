<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('products', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('userId')->unsigned();
			$table->string('name')->unique();
			$table->integer('price')->default('0');
			$table->integer('grade')->default('0');
			$table->smallInteger('stock')->default('0');
			$table->boolean('isItNew')->default(true);
			$table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->boolean('moneyRetreive')->default(false);
			$table->string('views')->default('0');
			$table->string('shortDesc')->default('No description');
			$table->string('longDesc')->default('No description');
			$table->string('pictures');
			$table->integer('type')->unsigned();
			$table->foreign('userId')->references('id')->on('users');
			$table->foreign('type')->references('id')->on('types');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('products');
	}

}
