@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Editar Equipo</h1>

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

        <form action="{{ route('equipos.update', $equipo['id_equipo']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="tipo" class="form-label">Tipo de Equipo</label>
                <select class="form-control" id="tipo" name="tipo" required>
                    <option value="">Seleccione un tipo</option>
                    <option value="Laptop" {{ old('tipo', $equipo['tipo'] ?? '') == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                    <option value="Smartphone" {{ old('tipo', $equipo['tipo'] ?? '') == 'Smartphone' ? 'selected' : '' }}>Smartphone</option>
                    <option value="Desktop" {{ old('tipo', $equipo['tipo'] ?? '') == 'Desktop' ? 'selected' : '' }}>Desktop</option>
                    <option value="Impresora" {{ old('tipo', $equipo['tipo'] ?? '') == 'Impresora' ? 'selected' : '' }}>Impresora</option>
                    <option value="Otro" {{ old('tipo', $equipo['tipo'] ?? '') == 'Otro' ? 'selected' : '' }}>Otro</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" id="modelo" name="modelo" value="{{ old('modelo', $equipo['modelo'] ?? '') }}">
            </div>
            <div class="mb-3">
                <label for="num_serie" class="form-label">Número de Serie</label>
                <input type="text" class="form-control" id="num_serie" name="num_serie" value="{{ old('num_serie', $equipo['num_serie'] ?? '') }}">
            </div>
            <div class="mb-3">
                <label for="id_marca" class="form-label">Marca</label>
                <select class="form-control" id="id_marca" name="id_marca">
                    <option value="">Seleccione una marca</option>
                    @if (!empty($marcas))
                        @foreach ($marcas as $marca)
                            <option value="{{ $marca['id_marca'] }}" {{ old('id_marca', $equipo['id_marca'] ?? '') == $marca['id_marca'] ? 'selected' : '' }}>
                                {{ $marca['nombre'] }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
