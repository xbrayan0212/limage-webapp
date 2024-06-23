<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
	public function up()
	{
		Schema::create('empleados', function (Blueprint $table) {
			$table->id('idEmpleado');
			$table->string('nombre', 255);
			$table->string('apellido', 255);
			$table->string('cedula', 15);
			$table->string('especialidad', 255);
			$table->string('telefono', 255)->nullable();
			$table->string('email', 255);
			$table->string('direccion', 255)->nullable();
			$table->string('status', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('empleados');
	}
}
