<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroTXEmpleadosTable extends Migration
{
	public function up()
	{
		Schema::create('registro_tx_empleados', function (Blueprint $table) {
			$table->id('idTXEmpleados');

			$table->unsignedBigInteger('idEmpleado');
			$table->foreign('idEmpleado')->references('idEmpleado')->on('empleados')->onDelete('cascade');

			$table->unsignedBigInteger('idTipoTX');
			$table->foreign('idTipoTX')->references('idTipoTX')->on('tipos_tx')->onDelete('cascade');

			$table->unsignedBigInteger('idServicio');
			$table->foreign('idServicio')->references('idServicio')->on('servicio')->onDelete('cascade');

			$table->unsignedBigInteger('idFormaPago');
			$table->foreign('idFormaPago')->references('idFormaPago')->on('forma_pago')->onDelete('cascade');

			$table->date('fecha');
			$table->double('monto_tx');
			$table->string('nota', 255)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('registro_tx_empleados');
	}
}
