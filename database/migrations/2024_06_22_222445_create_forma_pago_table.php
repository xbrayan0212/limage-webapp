<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormaPagoTable extends Migration
{
	public function up()
	{
		Schema::create('forma_pago', function (Blueprint $table) {
			$table->id('idFormaPago');
			$table->string('forma_pago', 50);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('forma_pago');
	}
}
