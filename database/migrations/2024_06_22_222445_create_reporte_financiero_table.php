<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReporteFinancieroTable extends Migration
{
	public function up()
	{
		Schema::create('reporte_financiero', function (Blueprint $table) {
			$table->id('idReporteFinanciero');

			$table->unsignedBigInteger('idEmpleado');
			$table->foreign('idEmpleado')->references('idEmpleado')->on('empleados')->onDelete('cascade');

			$table->date('mes');
			$table->double('ingresos_totales');
			$table->double('gastos_totales');
			$table->double('balance');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('reporte_financiero');
	}
}
