<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionAttributes extends Migration
{
    public function up()
    {
        Schema::create('subscription_attributes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->text('key');
            $table->text('value');
            $table->unsignedBigInteger('subscription_id');
            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscription_attributes');
    }
}
