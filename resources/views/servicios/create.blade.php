@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nuevo Servicio</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>¡Error!</strong> Hubo problemas con tu entrada.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('servicios.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="fecha_recepcion" class="form-label">Fecha de Recepción</label>
                <input type="date" class="form-control" id="fecha_recepcion" name="fecha_recepcion" value="{{ old('fecha_recepcion') }}" required>
            </div>
            <div class="mb-3">
                <label for="id_equipo" class="form-label">Equipo</label>
                <select class="form-control" id="id_equipo" name="id_equipo" required>
                    <option value="">Seleccione un equipo</option>
                    @if (!empty($equipos))
                        @foreach ($equipos as $equipo)
                            <option value="{{ $equipo['id_equipo'] }}" {{ old('id_equipo') == $equipo['id_equipo'] ? 'selected' : '' }}>{{ $equipo['modelo'] }} ({{ $equipo['marca']['nombre'] ?? 'N/A' }})</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="id_tecnico" class="form-label">Técnico</label>
                <select class="form-control" id="id_tecnico" name="id_tecnico">
                    <option value="">Seleccione un técnico</option>
                    @if (!empty($tecnicos))
                        @foreach ($tecnicos as $tecnico)
                            <option value="{{ $tecnico['id_tecnico'] }}" {{ old('id_tecnico') == $tecnico['id_tecnico'] ? 'selected' : '' }}>{{ $tecnico['nombre'] }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="diagnostico" class="form-label">Diagnóstico / Problema</label>
                <textarea class="form-control" id="diagnostico" name="diagnostico" rows="3">{{ old('diagnostico') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label">Estado</label>
                <select class="form-control" id="estado" name="estado" required>
                    <option value="Recibido" {{ old('estado') == 'Recibido' ? 'selected' : '' }}>Recibido</option>
                    <option value="En Reparación" {{ old('estado') == 'En Reparación' ? 'selected' : '' }}>En Reparación</option>
                    <option value="Finalizado" {{ old('estado') == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                    <option value="Entregado" {{ old('estado') == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
