<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBranchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('branches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('bill_prefix');
            $table->boolean('is_app');
            $table->unsignedBigInteger('country_id')->nullable()->default(null);
            $table->unsignedBigInteger('city_id')->nullable()->default(null);
            $table->unsignedBigInteger('area_id')->nullable()->default(null);
            $table->unsignedBigInteger('details')->nullable()->default(null);
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
        Schema::dropIfExists('branches');
    }
}
