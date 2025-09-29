@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Servicios</h1>
    <a href="{{ route('servicios.create') }}" class="btn btn-primary mb-3">Nuevo Servicio</a>

    <table class="table table-striped">
        <thead class="table-dark">
          <tr>
            <th>ID</th>
            <th>Fecha Recepción</th>
            <th>Equipo</th>
            <th>Técnico</th>
            <th>Diagnóstico</th>
            <th class="text-center">Estado</th>
            <th>Acciones</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($servicios as $servicio)
            <tr>
              <td>{{ $servicio['id_servicio'] }}</td>
              <td>{{ $servicio['fecha_recepcion'] }}</td>
              <td>
                @if ($servicio['equipo'])
                  <strong>{{ $servicio['equipo']['marca']['nombre'] ?? 'Sin Marca' }}</strong> - {{ $servicio['equipo']['modelo'] }}
                @else
                  N/A
                @endif
              </td>
              <td>{{ $servicio['tecnico']['nombre'] ?? 'N/A' }}</td>
              <td>{{ $servicio['diagnostico'] }}</td>
              <td class="text-center">
                <span class="badge bg-info text-dark">{{ $servicio['estado'] }}</span>
              </td>
              <td>
                <a href="{{ route('servicios.edit', $servicio['id_servicio']) }}" class="btn btn-sm btn-warning">Editar</a>
                <form action="{{ route('servicios.destroy', $servicio['id_servicio']) }}" method="POST" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="7" class="text-center">No hay servicios registrados.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
</div>
@endsection