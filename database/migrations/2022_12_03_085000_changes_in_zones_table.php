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
        Schema::table('zones', function (Blueprint $table) {
            $table->float('marsa_hs_child', 10, 2);
            $table->float('marsa_limo_child', 10, 2);
            $table->float('hurgada_hs_child', 10, 2);
            $table->float('hurgada_limo_child', 10, 2);
            $table->float('added_hs_per_child', 10, 2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zones', function (Blueprint $table) {
            //
        });
    }
};
