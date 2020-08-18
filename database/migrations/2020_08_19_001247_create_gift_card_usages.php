<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiftCardUsages extends Migration
{
    public function up()
    {
        Schema::create('gift_card_usages', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('card_id');
            $table->unsignedBigInteger('user_id');
            $table->decimal('price');

            $table->foreign('card_id')->references('id')->on('gift_cards')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('gift_card_usages');
    }
}
