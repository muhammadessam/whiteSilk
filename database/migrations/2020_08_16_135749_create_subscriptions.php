<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptions extends Migration
{
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->longText('description')->nullable()->default(null);
            $table->text('img')->nullable()->default(null);
            $table->boolean('is_active');
            $table->decimal('price');
            $table->enum('type', ['قطعة', 'تاريخ', 'مبلغ']);

            $table->unsignedInteger('pieces')->nullable()->default(0);
            $table->unsignedInteger('days')->nullable()->default(null);
            $table->decimal('added_credit')->nullable()->default(null);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
