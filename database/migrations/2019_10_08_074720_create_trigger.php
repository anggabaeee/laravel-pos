<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
        CREATE TRIGGER order_item_tr AFTER INSERT ON `order_items` FOR EACH ROW
            BEGIN
            UPDATE inventory SET qty = qty - NEW.qty 
            WHERE product_code = NEW.product_code AND outlet_id = (SELECT orders.outlet_id FROM orders WHERE orders.id = NEW.order_id);
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `order_item_tr`');
    }
}
