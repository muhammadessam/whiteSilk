<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDriverTimes extends Migration
{
    public function up()
    {
        Schema::create('driver_times', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->time('from');
            $table->time('to');
            $table->unsignedInteger('max');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('driver_times');
    }
}
