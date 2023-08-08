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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('name', 30);
            $table->string('apellido', 30);
            $table->string('cedula', 10)->unique();
            $table->string('telefono')->unique(); 
            $table->date('fecha_nacimiento'); 
            $table->decimal('salario', 10, 2); 
            $table->string('email')->unique();
            $table->string('sitioweb'); 
            $table->string('contrasena')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
