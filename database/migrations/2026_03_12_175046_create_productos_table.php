<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->string('categoria')->nullable();

            $table->decimal('precio_original', 10, 2);
            $table->decimal('precio_descuento', 10, 2)->nullable();
            $table->decimal('porcentaje_descuento', 5, 2)->nullable();

            $table->integer('stock')->default(0);
            $table->boolean('activo')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};