<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Agregar Cambio de Salario</title>
</head>
<body>
<div class="container">
    <h1>Agregar Cambio de Salario</h1>
    <form action="{{ route('historial_salarios.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="empleado_id" class="form-label">Empleado</label>
            <select class="form-control" id="empleado_id" name="empleado_id" required>
                @foreach ($empleados as $empleado)
                    <option value="{{ $empleado->id }}">{{ $empleado->nombre }} {{ $empleado->apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="salario_anterior" class="form-label">Salario Anterior</label>
            <input type="number" class="form-control" id="salario_anterior" name="salario_anterior" required>
        </div>
        <div class="mb-3">
            <label for="salario_nuevo" class="form-label">Salario Nuevo</label>
            <input type="number" class="form-control" id="salario_nuevo" name="salario_nuevo" required>
        </div>
        <div class="mb-3">
            <label for="fecha_cambio" class="form-label">Fecha de Cambio</label>
            <input type="date" class="form-control" id="fecha_cambio" name="fecha_cambio" required>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('historial_salarios.index') }}" class="btn btn-warning">Cancelar</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
