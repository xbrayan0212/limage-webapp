<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
	public function up()
	{
		Schema::create('productos', function (Blueprint $table) {
			$table->id('idProducto');
			$table->string('codigo_barra', 255);
			$table->string('nombre_producto', 255);
			$table->string('descripcion', 255)->nullable();
			$table->integer('cantidad_stock');
			$table->date('fecha_registro');
			$table->string('categoría', 255)->nullable();
			$table->unsignedBigInteger('idProveedor');
			$table->foreign('idProveedor')->references('idProveedor')->on('proveedores')->onDelete('cascade');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('productos');
	}
}
