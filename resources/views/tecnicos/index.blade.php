@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Técnicos</h1>
        <a href="{{ route('tecnicos.create') }}" class="btn btn-primary mb-3">Nuevo Técnico</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Especialidad</th>
                    <th>Correo</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @if (!empty($tecnicos))
                    @foreach ($tecnicos as $tecnico)
                        <tr>
                            <td>{{ $tecnico['id_tecnico'] }}</td>
                            <td>{{ $tecnico['nombre'] }}</td>
                            <td>{{ $tecnico['especialidad'] }}</td>
                            <td>{{ $tecnico['correo'] }}</td>
                            <td>{{ $tecnico['telefono'] }}</td>
                            <td>
                                <a href="{{ route('tecnicos.edit', $tecnico['id_tecnico']) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('tecnicos.destroy', $tecnico['id_tecnico']) }}" method="POST" style="display:inline-block;">
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
