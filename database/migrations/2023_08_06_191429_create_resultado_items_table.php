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
        Schema::create('resultado_items', function (Blueprint $table) {
            $table->id();
            $table->text('questao');
            $table->text('resposta');
            $table->unsignedInteger('docente_id');
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
        Schema::dropIfExists('resultado_items');
    }
};
