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
        Schema::create('medico', function (Blueprint $table) {
            $table->id();
            //especialidad
            $table->string('specialty')->require();
            //numeor de colegiado
            $table->integer('collegiate_num')->require();
            //experiencia
            $table->boolean('experience')->require();
            //fecha de contratación 
            $table->date('date_hire')->require();
            //usuaio 
            $table->foreignId('cod_user')->references('id')->on('users')->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medico');
    }
};
