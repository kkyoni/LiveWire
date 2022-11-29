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
        Schema::create('person', function (Blueprint $table) {
            $table->id();
            $table->string('nachname')->length(250)->nullable();
            $table->string('vorname')->length(250)->nullable();
            $table->string('anrede_id')->length(250)->nullable();
            $table->string('anrede_brief_manuell')->length(250)->nullable();
            $table->string('anrede_adresse_manuell')->length(250)->nullable();
            $table->string('titel_id')->length(250)->nullable();
            $table->string('titel_verliehen_id')->length(250)->nullable();
            $table->string('titel_nachgestellt_id')->length(250)->nullable();
            $table->string('email')->length(250)->nullable();
            $table->string('telefon')->length(250)->nullable();
            $table->string('mobil')->length(250)->nullable();
            $table->string('email2')->length(250)->nullable();
            $table->string('telefon2')->length(250)->nullable();
            $table->string('mobil2')->length(250)->nullable();
            $table->string('fax')->length(250)->nullable();
            $table->string('person_id_assistenz')->nullable();
            $table->string('person_id_assistenz2')->nullable();
            $table->string('status_person_id')->length(250)->nullable();
            $table->enum('sprache',['de','en'])->default('de');
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
        Schema::dropIfExists('person');
    }
};
