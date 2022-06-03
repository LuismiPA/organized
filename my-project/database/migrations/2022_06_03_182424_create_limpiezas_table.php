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
            $table->foreignId("worker_id")->constrained('users')
            ->cascadeOnUpdate()
            ->cascadeOnDelete()
            ->nullable();
            $table->enum('estado', ['pendiente', 'planificada', 'acabada']);
            $table->timestamp('horario');
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
