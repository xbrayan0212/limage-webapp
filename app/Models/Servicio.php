<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
		
		protected $table = 'servicio';
    protected $primaryKey = 'idServicio';

    protected $fillable = [
        'tipo_servicio',
        'servicio_detalle',
    ];
}
