<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->text('description')->nullable()->default(null);
            $table->enum('type', ['ثابت', 'نسبة']);
            $table->decimal('value');
            $table->boolean('is_free_Shipping')->nullable()->default(false);
            $table->unsignedInteger('total_usage')->nullable()->default(null);
            $table->unsignedInteger('usage_per_user')->nullable()->default(null);
            $table->boolean('is_active')->default(true);
            $table->timestamp('start')->nullable()->default(null);
            $table->timestamp('end')->nullable()->default(null);
            $table->decimal('minimum_amount')->nullable()->default(null);
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
        Schema::dropIfExists('coupons');
    }
}
