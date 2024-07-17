<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoTX extends Model
{
    use HasFactory;

		protected $table = 'tipos_tx';
    protected $primaryKey = 'idTipoTX';

    protected $fillable = [
        'nombre_tipo_tx',
    ];
}
