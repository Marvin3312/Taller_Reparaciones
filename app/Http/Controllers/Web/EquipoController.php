<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Marca;

class EquipoController extends Controller
{
    // Mostrar todos los equipos
    public function index()
    {
        $equipos = Equipo::with('marca')->get();
        return view('equipos.index', ['equipos' => $equipos]);
    }

    // Formulario para crear un nuevo equipo
    public function create()
    {
        $marcas = Marca::all();
        return view('equipos.create', ['marcas' => $marcas]);
    }

    // Guardar un nuevo equipo en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'num_serie' => 'required|string|max:100|unique:equipo,num_serie',
            'id_marca' => 'required|exists:marca,id_marca',
        ]);

        Equipo::create($request->all());

        return redirect()->route('equipos.index');
    }

    // Formulario para editar un equipo existente
    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);
        $marcas = Marca::all();
        return view('equipos.edit', ['equipo' => $equipo, 'marcas' => $marcas]);
    }

    // Actualizar un equipo existente
    public function update(Request $request, $id)
    {
        $equipo = Equipo::findOrFail($id);

        $request->validate([
            'tipo' => 'required|string|max:100',
            'modelo' => 'required|string|max:100',
            'num_serie' => "required|string|max:100|unique:equipo,num_serie,$id,id_equipo",
            'id_marca' => 'required|exists:marca,id_marca',
        ]);

        $equipo->update($request->all());

        return redirect()->route('equipos.index');
    }

    // Eliminar un equipo
    public function destroy($id)
    {
        Equipo::destroy($id);
        return redirect()->route('equipos.index');
    }
}
