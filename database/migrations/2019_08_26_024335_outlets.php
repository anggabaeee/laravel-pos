<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Outlets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outlets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name_outlet',100);
            $table->string('address_outlet',100);
            $table->string('contact_number',50);
            $table->text('receipt_header');
            $table->text('receipt_footer');         
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
        Schema::drop('outlets');
    }
}
