<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Servicio;
use App\Models\Equipo;
use App\Models\Tecnico;
use Barryvdh\DomPDF\Facade\Pdf;

class ServicioController extends Controller
{
    public function index()
    {
        // Trae todos los servicios con sus relaciones de equipo y técnico
        $servicios = Servicio::with('equipo.marca', 'tecnico')->latest()->get();

        return view('servicios.index', ['servicios' => $servicios]);
    }

    public function create()
    {
        // Trae todos los equipos y técnicos para los select
        $equipos = Equipo::all();
        $tecnicos = Tecnico::all();

        return view('servicios.create', ['equipos' => $equipos, 'tecnicos' => $tecnicos]);
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $request->validate([
            'fecha_recepcion' => 'required|date',
            'estado' => 'required|string|max:100',
            'diagnostico' => 'nullable|string|max:255',
            'solucion' => 'nullable|string|max:255',
            'id_equipo' => 'required|exists:equipo,id_equipo',
            'id_tecnico' => 'required|exists:tecnico,id_tecnico',
        ]);

        Servicio::create($request->all());

        return redirect()->route('servicios.index');
    }

    public function edit($id)
    {
        $servicio = Servicio::findOrFail($id);
        $equipos = Equipo::all();
        $tecnicos = Tecnico::all();

        return view('servicios.edit', [
            'servicio' => $servicio,
            'equipos' => $equipos,
            'tecnicos' => $tecnicos
        ]);
    }

    public function update(Request $request, $id)
    {
        $servicio = Servicio::findOrFail($id);

        // Validación de actualización
        $request->validate([
            'fecha_recepcion' => 'required|date',
            'estado' => 'required|string|max:100',
            'diagnostico' => 'nullable|string|max:255',
            'solucion' => 'nullable|string|max:255',
            'id_equipo' => 'required|exists:equipo,id_equipo',
            'id_tecnico' => 'required|exists:tecnico,id_tecnico',
        ]);

        $servicio->update($request->all());

        return redirect()->route('servicios.index');
    }

    public function destroy($id)
    {
        Servicio::destroy($id);

        return redirect()->route('servicios.index');
    }

    public function generarTicketPdf($id)
    {
        $servicio = Servicio::with('equipo.marca', 'tecnico')->findOrFail($id);
        $pdf = Pdf::loadView('servicios.ticket', ['servicio' => $servicio]);
        return $pdf->stream('ticket-servicio-'.$id.'.pdf');
    }
}
