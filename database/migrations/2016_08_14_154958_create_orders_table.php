<?php

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
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('cart');
            $table->string('name', 255);
            $table->string('address', 255);
            $table->string('postcode', 15);
            $table->string('cardnumber'); // string so we can encrypy or hash
            $table->string('lastdigits');
            $table->integer('order_key'); // random number but API's sopmetimes return keys
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
        Schema::drop('orders');
    }
}
