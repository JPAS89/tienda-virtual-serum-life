<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('user_id');
            $table->text('cartId');
            $table->text('address');
            $table->string('name');
            $table->string('total');
        });*/

        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id'); 
            $table->char('name');
            $table->char('secondName');
            $table->char('email'); 
            $table->char('address');
            $table->char('telephone');  
            $table->char('status');       
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
