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
        Schema::create('limpiezas', function (Blueprint $table) {
            $table->id();
            $table->foreignId("apartment_id")->constrained('apartments')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            //ESTAS DOS LINEAS SUSTITUYEN A FOREIGNID CON LA VENTAJA QUE PUEDO PONERLO NULLABLE
            $table->unsignedBigInteger('worker_id')->nullable();
            $table->foreign('worker_id')->references('id')->on('users');
            $table->foreignId("propietario_id")->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->enum('estado', ['pendiente', 'planificada', 'acabada'])->default('pendiente');
            $table->timestamp('horario')->nullable();
            $table->enum('tipo_limpieza', ['normal', 'completa']);
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
        Schema::dropIfExists('limpiezas');
    }
};
