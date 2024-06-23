<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaccionTable extends Migration
{
	public function up()
	{
		Schema::create('transaccion', function (Blueprint $table) {
			$table->id('idTransaccion');

			$table->unsignedBigInteger('idTipoTX');
			$table->foreign('idTipoTX')->references('idTipoTX')->on('tipos_tx')->onDelete('cascade');

			$table->unsignedBigInteger('idEmpleado');
			$table->foreign('idEmpleado')->references('idEmpleado')->on('empleados')->onDelete('cascade');

			$table->unsignedBigInteger('idServicio');
			$table->foreign('idServicio')->references('idServicio')->on('servicio')->onDelete('cascade');

			$table->unsignedBigInteger('idFormaPago');
			$table->foreign('idFormaPago')->references('idFormaPago')->on('forma_pago')->onDelete('cascade');

			$table->unsignedBigInteger('idProducto')->nullable();
			$table->foreign('idProducto')->references('idProducto')->on('productos')->onDelete('cascade');

			$table->date('fecha');
			$table->double('precio_servicio');
			$table->double('itbms')->nullable();
			$table->double('descuento_producto')->nullable();
			$table->double('venta_producto')->nullable();
			$table->integer('propina')->nullable();
			$table->string('descripcion', 255)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('transaccion');
	}
}
