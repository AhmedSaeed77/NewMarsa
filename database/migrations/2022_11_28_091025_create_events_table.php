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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_de');
            $table->string('title_cz');
            $table->longText('overview');
            $table->longText('overview_de');
            $table->longText('overview_cz');
            $table->longText('includes');
            $table->longText('includes_de');
            $table->longText('includes_cz');
            $table->longText('exclude');
            $table->longText('exclude_de');
            $table->longText('exclude_cz');
            $table->mediumText('image');
            $table->date('availability');
            $table->string('time');
            $table->foreignId('place_id');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('events');
    }
};
