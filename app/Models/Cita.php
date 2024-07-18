<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    protected $table = 'agendar_cita';

    protected $fillable = [
        'idEmpleado',
        'idServicio',
        'fecha',
        'duracion',
        'status',
        'user_id',
    ];
}

