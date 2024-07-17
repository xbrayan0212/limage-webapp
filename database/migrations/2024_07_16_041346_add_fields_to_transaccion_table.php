<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('transaccion', function (Blueprint $table) {
					$table->double('total_transaccion')->after('descripcion');
					$table->double('monto_salon')->after('total_transaccion');
					$table->double('monto_empleado')->after('monto_salon');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('transaccion', function (Blueprint $table) {
					$table->dropColumn('total_transaccion');
					$table->dropColumn('monto_salon');
					$table->dropColumn('monto_empleado');
        });
    }
};
