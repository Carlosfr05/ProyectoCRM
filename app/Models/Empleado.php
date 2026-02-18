<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empleado extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'empleados';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'direccion',
        'puesto',
        'salario',
        'fecha_contratacion',
        'foto',
    ];

    protected $casts = [
        'salario' => 'decimal:2',
        'fecha_contratacion' => 'date',
    ];
}
