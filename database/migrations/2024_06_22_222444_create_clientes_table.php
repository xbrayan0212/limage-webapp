<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
	public function up()
	{
		Schema::create('clientes', function (Blueprint $table) {
			$table->id('idCliente');
			$table->string('nombre', 255);
			$table->string('apellido', 255);
			$table->string('email', 255);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('clientes');
	}
}
