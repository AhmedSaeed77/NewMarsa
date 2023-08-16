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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_de');
            $table->string('name_cz');
            $table->string('goals_en');
            $table->string('goals_de');
            $table->string('goals_cz');
            $table->string('address_en');
            $table->string('address_de');
            $table->string('address_cz');
            $table->string('Brief_en');
            $table->string('Brief_de');
            $table->string('Brief_cz');
            $table->string('vision_en');
            $table->string('vision_de');
            $table->string('vision_cz');
            $table->string('message_en');
            $table->string('message_de');
            $table->string('message_cz');
            
            $table->string('insta');
            $table->string('linkedin');
            $table->string('facebook');
            $table->string('site');
            $table->string('email');
            $table->string('whatsapp');
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
        Schema::dropIfExists('settings');
    }
};
