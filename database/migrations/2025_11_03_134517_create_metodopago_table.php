<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Metodopago;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('metodopago', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_pago');
            $table->timestamps();
        });
        Metodopago::create(['tipo_pago' => 'efectivo']);
        Metodopago::create(['tipo_pago' => 'deposito']);
        Metodopago::create(['tipo_pago' => 'tarjeta']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metodopago');
    }
};
