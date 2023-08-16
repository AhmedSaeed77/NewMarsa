<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_transports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('zone_id');
            $table->string('airport');
            $table->string('payment_token')->nullable();
            $table->integer('adult_num');
            $table->integer('child_num');
            $table->float('total_price',10,2);
            $table->string('payment_status');
            $table->string('cancel')->default('not requested');
            $table->string('refund')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('booking_transports');
    }
};
