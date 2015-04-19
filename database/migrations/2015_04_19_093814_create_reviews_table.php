<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reviews', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('fromUser')->unsigned();
			$table->integer('toUser')->unsigned();
			$table->string('content');
			$table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->foreign('fromUser')->references('id')->on('users');
			$table->foreign('toUser')->references('id')->on('users');
			$table->double('grade')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reviews');
	}

}
