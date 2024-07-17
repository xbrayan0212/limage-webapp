<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'agendar_cita';
    protected $primaryKey = 'idCita';

    protected $fillable = [
        'idEmpleado', 'idServicio', 'fecha', 'duracion', 'status', 'idCliente', 'user_id'
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'idEmpleado');
    }

    public function servicio()
    {
        return $this->belongsTo(Servicio::class, 'idServicio');
    }
}
