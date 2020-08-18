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

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('time_id')->references('id')->on('driver_times')->onDelete('cascade');
            $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
            $table->foreign('status_id')->references('id')->on('driver_order_status')->onDelete('cascade');
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_orders');
    }
}
