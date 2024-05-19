<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'empleado_id',
        'evaluador_id',
        'fecha',
        'puntuacion',
        'comentarios',
    ];

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public function evaluador()
    {
        return $this->belongsTo(Empleado::class, 'evaluador_id');
    }
}
