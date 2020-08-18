<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverOrders extends Migration
{
    public function up()
    {
        Schema::create('driver_orders', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('user_id')->nullable()->default(null);
            $table->unsignedBigInteger('time_id');
            $table->unsignedBigInteger('address_id')->nullable()->default(null);
            $table->unsignedInteger('pieces')->nullable()->default(null);
            $table->timestamp('date');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('subscription_id')->nullable()->default(null);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_orders');
    }
}
