<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class FormularioController extends Controller
{
    public function showSolicitudPlanchas()
    {
        return view('formularios.solicitud-planchas');
    }

    public function guardar(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'cliente' => 'required|string|max:100',    
            'op' => 'required|string|max:50',
            'pistas' => 'required|string|max:50',
            'referencia' => 'required|string|max:100',
            'colores_solicitados' => 'nullable|string|max:255',
            'piso_planchas' => 'nullable|string|max:100',
            'cantidad' => 'required|integer',
            'ancho_mm' => 'required|integer',
            'alto_mm' => 'required|integer',
        ]);

        // Crear una nueva solicitud con los datos validados
        Solicitud::create($validatedData);

        // Redirigir con un mensaje de éxito
        return redirect()->route('solicitud.planchas')->with('success', 'Datos guardados correctamente.');
    }
}