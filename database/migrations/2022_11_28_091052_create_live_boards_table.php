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
        Schema::create('live_boards', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('title_de');
            $table->string('title_cz');
            $table->longText('overview');
            $table->longText('overview_de');
            $table->longText('overview_cz');
            $table->longText('terms_and_conditions');
            $table->longText('terms_and_conditions_de');
            $table->longText('terms_and_conditions_cz');
            $table->longText('highlights');
            $table->longText('highlights_de');
            $table->longText('highlights_cz');
            $table->longText('faqs');
            $table->longText('faqs_de');
            $table->longText('faqs_cz');
            $table->longText('includes');
            $table->longText('includes_de');
            $table->longText('includes_cz');
            $table->longText('exclude');
            $table->longText('exclude_de');
            $table->longText('exclude_cz');
            $table->double('price');
            $table->mediumText('image');
            $table->double('additional_cost');
            $table->date('from_date');
            $table->date('to_date');
            $table->foreignId('place_id');
            $table->foreign('place_id')->references('id')->on('places')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('live_boards');
    }
};
