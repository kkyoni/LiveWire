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
        Schema::create('person_themen', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_id');
            $table->unsignedBigInteger('themengebiet_id');
            $table->string('funktion_id')->length(250)->nullable();
            $table->string('abteilung')->length(250)->nullable();
            $table->foreign('person_id')->references('id')->on('person');
            $table->foreign('themengebiet_id')->references('id')->on('themengebiet');
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
        Schema::dropIfExists('person_themen');
    }
};
