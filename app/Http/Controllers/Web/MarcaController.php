<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function index()
    {
        $marcas = Marca::withCount('equipos')->get();
        return view('marcas.index', ['marcas' => $marcas]);
    }

    public function create()
    {
        return view('marcas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:150|unique:marca,nombre',
        ]);

        Marca::create([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('marcas.index');
    }

    public function edit($id)
    {
        $marca = Marca::findOrFail($id);
        return view('marcas.edit', ['marca' => $marca]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:150|unique:marca,nombre,' . $id . ',id_marca',
        ]);

        $marca = Marca::findOrFail($id);
        $marca->update([
            'nombre' => $request->nombre,
        ]);

        return redirect()->route('marcas.index');
    }

    public function destroy($id)
    {
        Marca::destroy($id);
        return redirect()->route('marcas.index');
    }
}
