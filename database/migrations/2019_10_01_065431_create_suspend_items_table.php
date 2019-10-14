<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuspendItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspend_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('suspend_id');
            $table->string('product_code');
            $table->string('product_name');
            $table->double('cost', 11, 2);
            $table->double('price', 11, 2);
            $table->integer('qty');
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
        Schema::dropIfExists('suspend_items');
    }
}
