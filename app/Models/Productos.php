<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

		protected $table = 'productos';
    protected $primaryKey = 'idProducto';

		protected $fillable = [
			'codigo_barra', 'nombre_producto', 'descripcion', 'cantidad_stock', 'precio_producto', 'fecha_registro', 'categoria'
	];
}
