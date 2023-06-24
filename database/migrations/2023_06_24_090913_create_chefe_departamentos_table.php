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
        Schema::create('chefe_departamentos', function (Blueprint $table) {
            $table->id();
            $table->integer('docente_id')->unique();
            $table->integer('departamento_id')->unique();
            $table->foreign('departamento_id')->references('id')->on('departamentos')->cascadeOnDelete();
            $table->foreign('docente_id')->references('id')->on('users')->cascadeOnDelete();
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
        Schema::dropIfExists('chefe_departamentos');
    }
};
