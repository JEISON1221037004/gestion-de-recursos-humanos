<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialSalariosTable extends Migration
{
    public function up()
    {
        Schema::create('historial_salarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empleado_id')->constrained('empleados');
            $table->decimal('salario_anterior', 10, 2);
            $table->decimal('salario_nuevo', 10, 2);
            $table->date('fecha_cambio');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historial_salarios');
    }
}

