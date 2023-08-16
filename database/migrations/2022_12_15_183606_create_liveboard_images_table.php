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
        Schema::create('liveboard_images', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->bigInteger('liveboard_id')->unsigned();
            $table->foreign('liveboard_id')->references('id')->on('live_boards')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('liveboard_images');
    }
};
