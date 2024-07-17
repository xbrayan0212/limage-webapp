<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
	use HasFactory;

	protected $table = 'transaccion';
	protected $primaryKey = 'idTransaccion';

	protected $fillable = [
		'fecha',
		'idServicio',
		'idEmpleado',
		'precio_servicio',
		'idTipoTX',
		'itbms',
		'descuento_producto',
		'propina',
		'email',
		'idProducto',
		'descripcion',
		'total_transaccion',
		'monto_salon',
		'monto_empleado'
	];

	public function servicio()
	{
		return $this->belongsTo(Servicio::class, 'idServicio');
	}

	public function empleado()
	{
		return $this->belongsTo(Empleado::class, 'idEmpleado');
	}

	public function tipoTX()
	{
		return $this->belongsTo(TipoTX::class, 'idTipoTX');
	}

	public function producto()
	{
		return $this->belongsTo(Productos::class, 'idProducto');
	}
}
