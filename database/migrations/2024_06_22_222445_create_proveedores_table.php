<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProveedoresTable extends Migration
{
	public function up()
	{
		Schema::create('proveedores', function (Blueprint $table) {
			$table->id('idProveedor');
			$table->string('nombre', 255);
			$table->string('direccion', 255)->nullable();
			$table->string('telefono', 255)->nullable();
			$table->string('email', 255);
			$table->string('contacto', 255)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('proveedores');
	}
}
