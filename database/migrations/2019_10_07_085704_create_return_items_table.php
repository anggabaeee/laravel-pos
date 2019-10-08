<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReturnItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('return_item', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->string('product_code')->nullable();
            $table->string('price')->nullable();
            $table->string('qty')->nullable();
            $table->integer('item_condition')->nullable()->comment('1: Good, 2: NotGood');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('return_items');
    }
}
