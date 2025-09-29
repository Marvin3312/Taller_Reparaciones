@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Equipos</h1>
        <a href="{{ route('equipos.create') }}" class="btn btn-primary mb-3">Nuevo Equipo</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tipo</th>
                    <th>Modelo</th>
                    <th>N/S</th>
                    <th>Marca</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($equipos))
                    @foreach ($equipos as $equipo)
                        <tr>
                            <td>{{ $equipo['id_equipo'] }}</td>
                            <td>{{ $equipo['tipo'] }}</td>
                            <td>{{ $equipo['modelo'] }}</td>
                            <td>{{ $equipo['num_serie'] }}</td>
                            <td>{{ $equipo['marca']['nombre'] ?? 'N/A' }}</td>
                            <td>
                                <a href="{{ route('equipos.edit', $equipo['id_equipo']) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('equipos.destroy', $equipo['id_equipo']) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
