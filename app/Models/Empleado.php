<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

		protected $table = 'empleados';
    protected $primaryKey = 'idEmpleado';

    // Definir los campos que pueden ser rellenados masivamente
    protected $fillable = [
        'nombre', 'apellido', 'cedula', 'especialidad', 'telefono', 'email', 'direccion', 'status',
    ];
}
