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
        Schema::create('nivel_academicos', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->timestamps();
        });

        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("experiencia");
            $table->foreignId("nivel_academico_id")->constrained()->onDelete("cascade");
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
        Schema::dropIfExists('candidatos');
        Schema::dropIfExists('nivel_academicos');
    }
};
