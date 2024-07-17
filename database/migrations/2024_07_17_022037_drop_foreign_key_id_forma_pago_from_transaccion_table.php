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
        Schema::table('transaccion', function (Blueprint $table) {
            $table->dropForeign(['idFormaPago']);
            $table->dropColumn('idFormaPago'); // Opcional: si también quieres eliminar la columna
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transaccion', function (Blueprint $table) {
            $table->unsignedBigInteger('idFormaPago');
            $table->foreign('idFormaPago')->references('idFormaPago')->on('forma_pago')->onDelete('cascade');
        });
    }
};
