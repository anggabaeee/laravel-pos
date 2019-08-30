<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Product extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements('id_product');
            $table->string('code',100)->unique();
            $table->string('name_product',100);
            $table->string('category_id');
            $table->double('purchase_price', 11,2);
            $table->double('retail_price', 11,2);
            $table->string('thumbnail', 255);	            
            $table->timestamps();
            $table->boolean('status');	
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('product');
    }
}
