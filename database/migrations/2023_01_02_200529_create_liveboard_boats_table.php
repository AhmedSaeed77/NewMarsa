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
        Schema::create('liveboard_boats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('liveboard_id')->unsigned();
            $table->foreign('liveboard_id')->references('id')->on('live_boards')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('boat_id')->unsigned();
            $table->foreign('boat_id')->references('id')->on('boats')->onDelete('cascade')->onUpdate('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('liveboard_boats');
    }
};
