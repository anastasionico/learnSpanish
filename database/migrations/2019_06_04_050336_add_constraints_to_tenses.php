<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintsToTenses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tenses', function (Blueprint $table) {
            $table->foreign('verb_id')
            ->references('id')->on('verbs')
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
        Schema::table('tenses', function (Blueprint $table) {
            $table->dropForeign('tenses_verb_id_foreign');
        });
    }
}
