<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprobanteDigitalTable extends Migration
{
	public function up()
	{
		Schema::create('comprobante_digital', function (Blueprint $table) {
			$table->id('idComprobanteDigtial');

			$table->unsignedBigInteger('idTransaccion');
			$table->foreign('idTransaccion')->references('idTransaccion')->on('transaccion')->onDelete('cascade');

			$table->unsignedBigInteger('idCliente');
			$table->foreign('idCliente')->references('idCliente')->on('clientes')->onDelete('cascade');

			$table->date('fecha_emision');
			$table->double('monto');
			$table->string('detalle', 255)->nullable();
			$table->string('status', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('comprobante_digital');
	}
}
