<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Paciente;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('address');
            $table->string('phone', 12); 
            $table->string('email');
            $table->string('dpi', 13);
            $table->date('birthdate');
            $table->string('type_blood');
            $table->string('allergies')->nullable();
            //enfermedades cronicas
            $table->string('chronic_diseases')->nullable();
            $table->float('weight', 5, 2);
            $table->float('height', 5, 2);
            $table->date('entrydate');
            $table->string('status')->default('1');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paciente');
    }
};
