<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Giftcard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giftcard', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cardnumber',255);
            $table->double('value', 11,2);
            $table->date('expiry');
            $table->timestamps();
            $table->boolean('status');	
        });    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('giftcard');
    }
}
