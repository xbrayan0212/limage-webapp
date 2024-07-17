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
            $table->dropForeign(['idCliente']);
            $table->dropColumn('idCliente');
        });
    }

    public function down()
    {
        Schema::table('comprobante_digital', function (Blueprint $table) {
            $table->unsignedBigInteger('idCliente');
            $table->foreign('idCliente')->references('idCliente')->on('clientes')->onDelete('cascade');
        });
    }
};
