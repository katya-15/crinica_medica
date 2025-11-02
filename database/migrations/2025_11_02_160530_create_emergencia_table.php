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
        Schema::create('emergencia', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            //relacion que tienen el paciente con su contacto de emergencia 
            $table->string('relationship');
            $table->string('phone');
            $table->string('address');
            $table->foreignId('cod_paciente')->references('id')->on('paciente')->onDelete('no action');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergencia');
    }
};
