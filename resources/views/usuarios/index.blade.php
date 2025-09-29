@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Gestión de Usuarios</h1>
    <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">Nuevo Usuario</a>

    <div class="card">
        <div class="table-responsive text-nowrap">
            <table class="table table-striped">
                <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                @forelse ($usuarios as $usuario)
                    <tr>
                    <td>{{ $usuario->id_usuario }}</td>
                    <td>{{ $usuario->username }}</td>
                    <td><span class="badge bg-primary">{{ $usuario->rol }}</span></td>
                    <td>
                        <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" class="btn btn-sm btn-warning">Editar</a>
                        <form action="{{ route('usuarios.destroy', $usuario->id_usuario) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar a este usuario?')">Eliminar</button>
                        </form>
                    </td>
                    </tr>
                @empty
                    <tr>
                    <td colspan="4" class="text-center">No hay usuarios registrados.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
