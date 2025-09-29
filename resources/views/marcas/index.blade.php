@extends('layouts.app')

@section('content')
<div class="container">
  <h1>Marcas</h1>
  <a href="{{ route('marcas.create') }}" class="btn btn-primary mb-3">Nueva Marca</a>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th class="text-center">Nº de Equipos</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($marcas as $marca)
        <tr>
          <td>{{ $marca['id_marca'] }}</td>
          <td>{{ $marca['nombre'] }}</td>
          <td class="text-center">{{ $marca['equipos_count'] }}</td>
          <td>
            <a href="{{ route('marcas.edit', $marca['id_marca']) }}" class="btn btn-sm btn-warning">Editar</a>
            <form action="{{ route('marcas.destroy', $marca['id_marca']) }}" method="POST" style="display:inline-block;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
            </form>
          </td>
        </tr>
      @empty
        <tr>
          <td colspan="4" class="text-center">No hay marcas registradas.</td>
        </tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection