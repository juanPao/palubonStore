<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('users', function(Blueprint $table){
            $table->increments('id');
            $table->string('username');
            $table->string('password');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('gender');
            $table->string('email');
            $table->string('contactnum');
            $table->string('access');
            $table->string('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('users');
    }
}
