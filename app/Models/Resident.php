<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resident extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellidos',
        'telefono',
        'correo',
        'edad',
        'direccion',
        'comida_entregada',
        'observacion',
    ];
}
