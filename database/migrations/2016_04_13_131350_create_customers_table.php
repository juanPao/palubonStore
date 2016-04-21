<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('customers', function(Blueprint $table){
            $table->increments('id');
            $table->string('customer_num');
            $table->integer('balance');
            $table->string('firstname');
            $table->string('middlename');
            $table->string('lastname');
            $table->string('address');
            $table->string('contactnumber');
            $table->string('email');
            $table->text('description');
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
        Schema::drop('customers');
    }
}
