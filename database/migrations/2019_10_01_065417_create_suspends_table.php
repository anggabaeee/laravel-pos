<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuspendsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suspends', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref_number')->unique();
            $table->integer('customer_id');
            $table->string('customer_name');
            $table->integer('outlet_id');
            $table->double('subtotal', 11, 2);
            $table->double('discount_total', 11, 2);
            $table->double('tax', 11, 2);
            $table->double('grandtotal', 11, 2);
            $table->integer('total_items');
            $table->boolean('status');
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
        Schema::dropIfExists('suspends');
    }
}
