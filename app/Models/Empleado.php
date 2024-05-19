<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'fecha_contratacion',
        'departamento_id',
        'posicion_id',
        'salario',
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function posicion()
    {
        return $this->belongsTo(Posicion::class);
    }
}
