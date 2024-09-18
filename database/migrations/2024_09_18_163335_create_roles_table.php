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
        Schema::create('roles', function (Blueprint $table) {
            $table->id(); // ID para la tabla roles
            $table->string('name')->unique(); // Nombre del rol
            $table->timestamps();
        });

        // Insertar los roles predeterminados
        DB::table('roles')->insert([
            ['name' => 'admin'],
            ['name' => 'casher'],
            ['name' => 'waiter'],
            ['name' => 'customer'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
