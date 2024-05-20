<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Historial de Salarios</title>
</head>
<body>
<div class="container mt-4">
    <h1 class="mb-4">Historial de Salarios</h1>
    <div class="mb-3">
        <a href="{{ route('historial_salarios.create') }}" class="btn btn-success">Agregar Cambio de Salario</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Empleado</th>
                <th scope="col">Salario Anterior</th>
                <th scope="col">Salario Nuevo</th>
                <th scope="col">Fecha de Cambio</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($historial_salarios as $historial)
            <tr>
                <th scope="row">{{ $historial->id }}</th>
                <td>{{ $historial->empleado->nombre }} {{ $historial->empleado->apellido }}</td>
                <td>{{ $historial->salario_anterior }}</td>
                <td>{{ $historial->salario_nuevo }}</td>
                <td>{{ $historial->fecha_cambio }}</td>
                <td>
                    <a href="{{ route('historial_salarios.edit', $historial->id) }}" class="btn btn-info">Editar</a>
                    <form action="{{ route('historial_salarios.destroy', $historial->id) }}" method="POST" style="display: inline-block">
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
