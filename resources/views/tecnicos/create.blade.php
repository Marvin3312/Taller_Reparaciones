@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Nuevo Técnico</h1>

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

        <form action="{{ route('tecnicos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
            </div>
            <div class="mb-3">
                <label for="especialidad" class="form-label">Especialidad</label>
                <input type="text" class="form-control" id="especialidad" name="especialidad" value="{{ old('especialidad') }}">
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" value="{{ old('correo') }}">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono') }}">
            </div>
            <div class="mb-3">
                <label for="id_usuario" class="form-label">Usuario</label>
                <select class="form-control" id="id_usuario" name="id_usuario" required>
                    <option value="">Seleccione un usuario</option>
                    @if (!empty($usuarios))
                        @foreach ($usuarios as $usuario)
                            <option value="{{ $usuario['id_usuario'] }}" {{ old('id_usuario') == $usuario['id_usuario'] ? 'selected' : '' }}>{{ $usuario['username'] }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
