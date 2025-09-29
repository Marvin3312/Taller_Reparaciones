<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tecnico;
use App\Models\Usuario;

class TecnicoController extends Controller
{
    public function index()
    {
        $tecnicos = Tecnico::with('usuario')->get();
        return view('tecnicos.index', ['tecnicos' => $tecnicos]);
    }

    public function create()
    {
        $usuarios = Usuario::all();
        return view('tecnicos.create', ['usuarios' => $usuarios]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:150',
            'especialidad' => 'nullable|string|max:100',
            'correo' => 'nullable|email|unique:tecnico,correo',
            'telefono' => 'nullable|string|max:20',
            'id_usuario' => 'required|exists:usuario,id_usuario|unique:tecnico,id_usuario'
        ]);

        Tecnico::create($request->all());

        return redirect()->route('tecnicos.index');
    }

    public function edit($id)
    {
        $tecnico = Tecnico::findOrFail($id);
        $usuariosAsignados = Tecnico::where('id_tecnico', '!=', $id)->pluck('id_usuario')->all();
        $usuarios = Usuario::whereNotIn('id_usuario', $usuariosAsignados)->get();

        return view('tecnicos.edit', ['tecnico' => $tecnico, 'usuarios' => $usuarios]);
    }

    public function update(Request $request, $id)
    {
        $tecnico = Tecnico::findOrFail($id);

        $request->validate([
            'nombre' => 'required|string|max:150',
            'especialidad' => 'nullable|string|max:100',
            'correo' => "nullable|email|unique:tecnico,correo,$id,id_tecnico",
        ]);

        $tecnico->update($request->all());

        return redirect()->route('tecnicos.index');
    }

    public function destroy($id)
    {
        Tecnico::destroy($id);

        return redirect()->route('tecnicos.index');
    }
}