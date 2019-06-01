<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameTenceIdInConjugationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::table('conjugations', function (Blueprint $table) {
             $table->renameColumn('tence_id', 'tense_id');
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
            $table->renameColumn('tense_id', 'tence_id');
        });
    }
}
