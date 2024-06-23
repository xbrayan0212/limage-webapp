<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposTXTable extends Migration
{
	public function up()
	{
		Schema::create('tipos_tx', function (Blueprint $table) {
			$table->id('idTipoTX');
			$table->string('nombre_tipo_tx', 50);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('tipos_tx');
	}
}
