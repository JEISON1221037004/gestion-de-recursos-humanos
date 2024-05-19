<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEvaluacionesTable extends Migration
{
    public function up()
    {
        Schema::create('evaluaciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados');
            $table->foreignId('evaluador_id')->constrained('empleados');
            $table->date('fecha');
            $table->integer('puntuacion');
            $table->text('comentarios');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('evaluaciones');
    }
}
