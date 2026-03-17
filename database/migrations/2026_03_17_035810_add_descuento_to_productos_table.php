<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->decimal('precio_original', 10, 2)->nullable()->after('categoria');
            $table->decimal('precio_descuento', 10, 2)->nullable()->after('precio_original');
            $table->unsignedInteger('porcentaje_descuento')->nullable()->after('precio_descuento');
        });
    }

    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn([
                'precio_original',
                'precio_descuento',
                'porcentaje_descuento'
            ]);
        });
    }
};