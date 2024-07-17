<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
		public function up()
    {
        Schema::table('comprobante_digital', function (Blueprint $table) {
            // Eliminar la columna idCliente
            $table->dropForeign(['idCliente']);
            $table->dropColumn('idCliente');
            
            // Eliminar la columna user_id
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }

    public function down()
    {
        Schema::table('comprobante_digital', function (Blueprint $table) {
            // Restaurar la columna idCliente
            $table->unsignedBigInteger('idCliente');
            $table->foreign('idCliente')->references('idCliente')->on('clientes')->onDelete('cascade');
            
            // Restaurar la columna user_id
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
};
