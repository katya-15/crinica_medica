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
        Schema::create('factura', function (Blueprint $table) {
            $table->id();
            $table->decimal('total', 10, 2);
            $table->foreignId('metodopago_id')
                ->constrained('metodopago')
                ->onDelete('restrict');
            $table->timestamps();
            $table->foreignId('code_cita')->references('id')->on('cita')->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura');
    }
};
