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
        Schema::create('ort', function (Blueprint $table) {
            $table->id();
            $table->string('plz')->length(250)->nullable();
            $table->string('bezeichnung')->length(250)->nullable();
            $table->string('bundesland_id')->length(250)->nullable();
            $table->string('land_id')->length(250)->nullable();
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
        Schema::dropIfExists('ort');
    }
};
