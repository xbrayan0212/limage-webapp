<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicioTable extends Migration
{
    public function up()
    {
        Schema::create('servicio', function (Blueprint $table) {
            $table->bigIncrements('idServicio');
            $table->string('tipo_servicio', 50);
            $table->string('servicio_detalle', 255)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servicio');
    }
}

