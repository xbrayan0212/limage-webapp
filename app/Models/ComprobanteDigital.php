<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComprobanteDigital extends Model
{
    use HasFactory;

		protected $table = 'comprobante_digital';

    protected $fillable = ['idTransaccion', 'fecha_emision', 'monto', 'detalle', 'status'];

    public function transaccion()
    {
        return $this->belongsTo(Transaccion::class, 'idTransaccion');
    }
}
