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
        Schema::create('organisation', function (Blueprint $table) {
            $table->id();
            $table->string('titel')->length(250)->nullable();
            $table->text('synonyme')->length(250)->nullable();
            $table->string('adresse')->length(250)->nullable();
            $table->string('ort_id')->length(250)->nullable();
            $table->string('email')->length(250)->nullable();
            $table->string('telefon')->length(250)->nullable();
            $table->string('fax')->length(250)->nullable();
            $table->string('web')->length(250)->nullable();
            $table->string('uid')->length(250)->nullable();
            $table->string('fb')->length(250)->nullable();
            $table->string('wkonr')->length(250)->nullable();
            $table->string('status_id')->length(250)->nullable();
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
        Schema::dropIfExists('organisation');
    }
};
