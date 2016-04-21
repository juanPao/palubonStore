<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('products', function(Blueprint $table){

            $table->increments('id');
            $table->integer('product_num');
            $table->integer('product_rel');
            $table->string('name');
            $table->integer('price');
            $table->string('brand');
            $table->integer('weight');
            $table->string('category');
            $table->text('description');
            $table->string('image');
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
        Schema::drop('products');
    }
}
