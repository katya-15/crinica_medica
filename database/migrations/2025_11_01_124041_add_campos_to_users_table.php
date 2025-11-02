<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use PHPUnit\Framework\Attributes\After;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('status')->default(1);
            $table->string('username')->unique();
            $table->string('last_name')->nullable();
            $table->integer('phone')->maxlength(12);
            $table->string('rol');
            $table->string('dpi')->maxlength(13)->unique();
        });
        
        User::create([
            'name' => 'Admin',
            'last_name' => 'User',
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'status' => 1,
            'rol' => 'admin',
            'phone' => '44815615',
            'dpi' => '4568456982145',
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
