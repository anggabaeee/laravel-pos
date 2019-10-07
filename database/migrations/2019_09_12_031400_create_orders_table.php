<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('customer_id');
            $table->string('customer_name');
            $table->integer('outlet_id');
            $table->datetime('ordered_datetime');
            $table->double('subtotal', 11, 2);
            $table->double('discount_total', 11, 2);
            $table->double('tax', 11, 2);
            $table->double('grandtotal', 11, 2);
            $table->integer('total_items');
            $table->integer('payment_method');
            $table->string('payment_method_name');
            $table->string('cheque_number');
            $table->double('paid_amt', 11, 2);
            $table->double('return_change', 11, 2);
            $table->string('card_number');
            $table->boolean('vt_status')->comment('0: Debit Payment, 1: Completed');
            $table->boolean('status')->comment('1: Sales, 2: Return');
            $table->boolean('refund_status')->comment('1: Full Refund, 2: Partial Refund');
            $table->string('remark');
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
        Schema::dropIfExists('orders');
    }
}
