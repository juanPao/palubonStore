<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersLoanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('customer_loan',function(Blueprint $table){
            $table->increments('id');
            $table->integer('customer_id');
            $table->integer('product_id');
            $table->integer('original_price');
            $table->integer('new_price');
            $table->datetime('payment_due');
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
        Schema::drop('customer_loan');
    }
}
