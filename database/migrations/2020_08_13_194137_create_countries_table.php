<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->boolean('is_active')->default(true);
            $table->string('code')->nullable()->default(null);
            $table->text('img')->nullable()->default(null);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
