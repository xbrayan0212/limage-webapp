<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendarCitaTable extends Migration
{
	public function up()
	{
		Schema::create('agendar_cita', function (Blueprint $table) {
			$table->id('idCita');

			// Definición de claves foráneas con unsignedBigInteger
			$table->unsignedBigInteger('idCliente');
			$table->foreign('idCliente')->references('idCliente')->on('clientes')->onDelete('cascade');

			$table->unsignedBigInteger('idEmpleado');
			$table->foreign('idEmpleado')->references('idEmpleado')->on('empleados')->onDelete('cascade');

			$table->unsignedBigInteger('idServicio');
			$table->foreign('idServicio')->references('idServicio')->on('servicio')->onDelete('cascade');

			// Otros campos
			$table->date('fecha');
			$table->time('duracion');
			$table->string('status', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('agendar_cita');
	}
}
