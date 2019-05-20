<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVerbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('verbs', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('importance');
            $table->boolean('is_active');
            $table->string('verb_eng', 255);
            $table->string('verb_spa', 255);
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
        Schema::dropIfExists('verbs');
    }
}
