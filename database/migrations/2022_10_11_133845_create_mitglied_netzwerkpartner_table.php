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
        Schema::create('mitglied_netzwerkpartner', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mitglied_id');
            $table->unsignedBigInteger('netzwerkpartner_id');
            $table->string('funktion_id')->length(250)->nullable();
            $table->string('abteilung')->length(250)->nullable();
            $table->foreign('mitglied_id')->references('id')->on('mitglied');
            $table->foreign('netzwerkpartner_id')->references('id')->on('netzwerkpartner');
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
        Schema::dropIfExists('mitglied_netzwerkpartner');
    }
};
