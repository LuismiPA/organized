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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->text('direccion');
            $table->integer('codigo_postal');
            $table->enum('habitaciones', ['1', '2', '3', '4', '5', '6']);
            $table->enum('camas_dobles', ['1', '2', '3', '4', '5', '6']);
            $table->enum('camas_indiv', ['1', '2', '3', '4', '5', '6', '7', '8']);
            $table->enum('baños', ['1', '2', '3', '4', '5', '6']);
            $table->enum('solarium', ['si', 'no']);
            $table->foreignId("propietario_id")->constrained('users')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
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
        Schema::dropIfExists('apartments');
    }
};
