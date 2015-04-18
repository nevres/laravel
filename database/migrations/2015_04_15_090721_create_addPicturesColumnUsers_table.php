<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddPicturesColumnUsersTable extends Migration {

public function up()
{
    Schema::table('users', function($table)
    {
        $table->string('profilePicture');
     });

}

public function down()
{
    Schema::table('users', function($table)
    {
       $table->dropColumn('profilePicture');
    });
}

}