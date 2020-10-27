<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customer_id');
            $table->string('order_number', 20);
            $table->string('reference', 100);
            $table->string('shipping_fname', 100);
            $table->string('shipping_lname', 100);
            $table->string('shipping_address', 1000);
            $table->string('city', 50);
            $table->integer('zipcode');
            $table->string('shipping_email', 100); 
            $table->string('phone', 20);
            $table->integer('status');
            $table->integer('total_qty')->nullable();
            $table->double('total_price');
            $table->integer('shipping_fee')->nullable();
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
        Schema::dropIfExists('order');
    }
}
