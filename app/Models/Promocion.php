<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'descripcion', 'imagen'];

    // Especifica el nombre de la tabla si no sigue la convención de nombres pluralizados
    protected $table = 'promociones';
}

