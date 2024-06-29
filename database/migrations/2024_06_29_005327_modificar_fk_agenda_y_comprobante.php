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
        // Modificar la tabla agendar_cita
        Schema::table('agendar_cita', function (Blueprint $table) {
            // Eliminar la clave foránea existente
            $table->dropForeign(['idCliente']);
            // Eliminar la columna idCliente
            $table->dropColumn('idCliente');
            // Agregar la nueva columna user_id
            $table->unsignedBigInteger('user_id');
            // Agregar la nueva clave foránea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        // Modificar la tabla comprobante_digital
        Schema::table('comprobante_digital', function (Blueprint $table) {
            // Eliminar la clave foránea existente
            $table->dropForeign(['idCliente']);
            // Eliminar la columna idCliente
            $table->dropColumn('idCliente');
            // Agregar la nueva columna user_id
            $table->unsignedBigInteger('user_id');
            // Agregar la nueva clave foránea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revertir los cambios en la tabla agendar_cita
        Schema::table('agendar_cita', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            // Restaurar la columna idCliente
            $table->unsignedBigInteger('idCliente');
            $table->foreign('idCliente')->references('idCliente')->on('clientes')->onDelete('cascade');
        });

        // Revertir los cambios en la tabla comprobante_digital
        Schema::table('comprobante_digital', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
            
            // Restaurar la columna idCliente
            $table->unsignedBigInteger('idCliente');
            $table->foreign('idCliente')->references('idCliente')->on('clientes')->onDelete('cascade');
        });
    }
};
