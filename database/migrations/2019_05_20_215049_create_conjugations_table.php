<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConjugationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conjugations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 255);
            $table->integer('tence_id');
            $table->boolean('is_active');
            $table->boolean('is_free');
            $table->boolean('is_irregular');
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
        Schema::dropIfExists('conjugations');
    }
}
