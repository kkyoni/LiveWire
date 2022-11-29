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
        Schema::create('tx_laender', function (Blueprint $table) {
            $table->id();
            $table->string('IEBStaatNr')->length(250)->nullable();
            $table->string('Bezeichnung')->length(250)->nullable();
            $table->string('Bezeichnung_en')->length(191)->nullable();
            $table->string('ISO')->length(250)->nullable();
            $table->string('iban')->length(250)->nullable();
            $table->enum('EU',['0','1'])->nullable();
            $table->enum('Arbeitserlaubnis',['0','1'])->nullable();
            $table->enum('Aufenthaltserlaubnis',['0','1'])->nullable();
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
        Schema::dropIfExists('tx_laender');
    }
};
