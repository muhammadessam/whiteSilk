<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionUser extends Migration
{
    public function up()
    {
        Schema::create('subscription_user', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('subscription_id');
            $table->unsignedBigInteger('client_id');
            $table->boolean('is_active')->default(true);

            $table->double('remaining_pieces')->nullable()->default(null);
            $table->date('start_date')->nullable()->default(null);
            $table->date('end_date')->nullable()->default(null);
            $table->decimal('credit')->nullable()->default(null);

            $table->foreign('subscription_id')->references('id')->on('subscriptions')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscription_user');
    }
}
