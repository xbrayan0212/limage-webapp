<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministradoresTable extends Migration
{
    public function up()
    {
        Schema::create('administradores', function (Blueprint $table) {
            $table->id('idAdministrador');
            $table->unsignedBigInteger('user_id')->unique(); // Relación con la tabla users
            $table->string('nombre', 255);
            $table->string('apellido', 255);
            $table->string('cedula', 15)->unique();
            $table->string('cargo_empresa', 255);
            $table->string('telefono', 255)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->string('status', 255);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('administradores');
    }
}