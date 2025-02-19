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
        Schema::table('users', function (Blueprint $table) {
            // Verifica si la columna 'active' no existe antes de agregarla
            if (!Schema::hasColumn('users', 'active')) {
                $table->boolean('active')->after('image_base64')->default(1)->comment('Indicates if the user is active');
            }

            // Verifica si la columna 'rol' no existe antes de agregarla
            if (!Schema::hasColumn('users', 'role')) {
                $table->unsignedBigInteger('role')->after('active')->default(1)->comment('Role of the user');
                $table->foreign('role')->references('id')->on('roles')->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
        // Elimina la columna 'active' si existe
        if (Schema::hasColumn('users', 'active')) {
            $table->dropColumn('active');
        }

        // Elimina la columna 'rol' y su llave foránea
        if (Schema::hasColumn('users', 'role')) {
            $table->dropForeign(['role']);
            $table->dropColumn('role');
        }
        });
    }
};
