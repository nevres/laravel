<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('userId')->unsigned();
			$table->integer('parentPost')->unsigned()->nullable();
			$table->integer('productId')->unsigned()->nullable();
			$table->string('title');
			$table->string('content');
			$table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->foreign('userId')->references('id')->on('users');
			$table->foreign('parentPost')->references('id')->on('comments');
			$table->foreign('productId')->references('id')->on('products');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
