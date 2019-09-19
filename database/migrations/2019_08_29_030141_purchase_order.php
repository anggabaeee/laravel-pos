<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PurchaseOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_order', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('po_number');
            $table->integer('total_pay')->nullable();
            $table->integer('total')->nullable();
            $table->integer('discount_amount')->nullable();
            $table->integer('id_outlet');
            $table->integer('id_supplier');
            $table->date('datenow');
            $table->string('note');
            $table->timestamps();
            $table->integer('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchase_order');
    }
}
