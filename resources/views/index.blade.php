<!DOCTYPE html>
<html>
<head>
    <title>Lista de Sofás</title>
</head>
<body>
    <h1>Lista de Sofás</h1>
    <a href="{{ route('sofas.create') }}">Crear Sofá</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Material</th>
            <th>Dimensiones</th>
            <th>Capacidad</th>
            <th>Color</th>
            <th>Acciones</th>
        </tr>
        @foreach($sofas as $sofa)
            <tr>
                <td>{{ $sofa->id }}</td>
                <td>{{ $sofa->material }}</td>
                <td>{{ $sofa->dimensiones }}</td>
                <td>{{ $sofa->capacidad }}</td>
                <td>{{ $sofa->color }}</td>
                <td>
                    <a href="{{ route('sofas.edit', $sofa->id) }}">Editar</a> |
                    <form action="{{ route('sofas.destroy', $sofa->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</body>
</html>