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
        Schema::create('cita', function (Blueprint $table) {
            $table->id();
            $table->string('motivo');
            $table->string('status')->default('1');
            $table->date('appointment_date');
            $table->time('start_time');
            $table->time('final_time');
            $table->foreignId('cod_user')->references('id')->on('users')->onDelete('no action');
            $table->foreignId('cod_paciente')->references('id')->on('paciente')->onDelete('no action');
            $table->foreignId('cod_servicio')->references('id')->on('servicio')->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cita');
    }
};
