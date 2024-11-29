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
        Schema::create('complementary_data', function (Blueprint $table) {
            $table->id();
            $table->string('study')->nullable(); 
            $table->string('card',20)->unique();            
            $table->string('company_id',20)->nullable();
            $table->unsignedBigInteger('user_id'); 
            $table->timestamps();

            //Llave Foranea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
