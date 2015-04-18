<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddSoldColumnProductTable extends Migration {

public function up()
{
    Schema::table('products', function($table)
    {
        $table->boolean('sold')->default(false);
     });
}

public function down()
{
    Schema::table('products', function($table)
    {
       $table->dropColumn('sold');
    });
}

}