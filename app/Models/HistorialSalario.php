<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistorialSalario extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'salario_anterior',
        'salario_nuevo',
        'fecha_cambio',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class);
    }
}
