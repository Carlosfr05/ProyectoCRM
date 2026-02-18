<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sucursal extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sucursales';

    protected $fillable = [
        'nombre',
        'ciudad',
        'estado',
        'codigo_postal',
        'direccion',
        'telefono',
        'email',
        'horario_apertura',
        'horario_cierre',
        'gerente',
    ];
}
