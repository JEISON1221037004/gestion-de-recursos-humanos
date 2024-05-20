<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Lista de Evaluaciones</title>
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Lista de Evaluaciones</h1>
    <div class="mb-3">
        <a href="{{ route('evaluaciones.create') }}" class="btn btn-success">Agregar Evaluación</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Empleado</th>
                <th scope="col">Evaluador</th>
                <th scope="col">Fecha</th>
                <th scope="col">Puntuación</th>
                <th scope="col">Comentarios</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evaluaciones as $evaluacion)
            <tr>
                <th scope="row">{{ $evaluacion->id }}</th>
                <td>{{ $evaluacion->empleado->nombre }} {{ $evaluacion->empleado->apellido }}</td>
                <td>{{ $evaluacion->evaluador->nombre }} {{ $evaluacion->evaluador->apellido }}</td>
                <td>{{ $evaluacion->fecha }}</td>
                <td>{{ $evaluacion->puntuacion }}</td>
                <td>{{ $evaluacion->comentarios }}</td>
                <td>
                    <a href="{{ route('evaluaciones.edit', $evaluacion->id) }}" class="btn btn-info">Editar</a>
                    <form action="{{ route('evaluaciones.destroy', $evaluacion->id) }}" method="POST" style="display: inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
