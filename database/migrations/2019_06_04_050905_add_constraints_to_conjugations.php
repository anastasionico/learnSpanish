<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsToConjugations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('conjugations', function (Blueprint $table) {
            $table->foreign('tense_id')
            ->references('id')->on('tenses')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('conjugations', function (Blueprint $table) {
            $table->dropForeign('conjugations_tense_id_foreign');
        });
    }
}
