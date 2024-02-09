<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('proformas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->foreignId('id_clientes');
            $table->foreignId('id_asesors');
            $table->foreignId('id_proyectos');
            $table->string('nombre');
            $table->integer('area');
            $table->double('precio', 15, 8);
            $table->double('inicial', 15, 8);
            $table->double('bono', 15, 8);
            $table->integer('plazo');
            $table->integer('interes');
            $table->double('cuota_men', 15, 8);
            $table->double('saldo_fin', 15, 8);
            $table->timestamps();

            $table->foreign('id_clientes')->references('id')->on('clientes')->onDelete("cascade");
            $table->foreign('id_asesors')->references('id')->on('asesors');
            $table->foreign('id_proyectos')->references('id')->on('proyectos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proformas');
    }
};
