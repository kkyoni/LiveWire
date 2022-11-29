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
        Schema::create('mitglied', function (Blueprint $table) {
            $table->id();
            $table->string('organisation_id')->nullable();
            $table->string('bezeichnung')->length(250)->nullable();
            $table->string('feei_id')->nullable();
            $table->string('einteilung')->nullable();
            $table->boolean('feei_kv')->default(0);
            $table->boolean('feei_member')->default(0);
            $table->boolean('ev_member')->default(0);
            $table->string('adresse')->length(250)->nullable();
            $table->string('ort_id')->nullable();
            $table->string('email')->length(250)->nullable();
            $table->string('telefon')->length(250)->nullable();
            $table->string('fax')->length(250)->nullable();
            $table->string('web')->length(250)->nullable();
            $table->string('status_id')->nullable();
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
        Schema::dropIfExists('mitglied');
    }
};
