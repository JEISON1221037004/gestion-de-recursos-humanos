<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Agregar Nueva Evaluación</title>
</head>
<body>
<div class="container">
    <h1>Agregar Nueva Evaluación</h1>
    <form action="{{ route('evaluaciones.store') }}" method="POST">
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
            <label for="evaluador_id" class="form-label">Evaluador</label>
            <select class="form-control" id="evaluador_id" name="evaluador_id" required>
                @foreach ($empleados as $evaluador)
                    <option value="{{ $evaluador->id }}">{{ $evaluador->nombre }} {{ $evaluador->apellido }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="fecha" name="fecha" required>
        </div>
        <div class="mb-3">
            <label for="puntuacion" class="form-label">Puntuación</label>
            <input type="number" class="form-control" id="puntuacion" name="puntuacion" required>
        </div>
        <div class="mb-3">
            <label for="comentarios" class="form-label">Comentarios</label>
            <textarea class="form-control" id="comentarios" name="comentarios" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Crear</button>
        <a href="{{ route('evaluaciones.index') }}" class="btn btn-warning">Cancelar</a>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
