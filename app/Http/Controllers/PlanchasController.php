<?php

namespace App\Http\Controllers;

use App\Models\corte;
use Illuminate\Http\Request; 
use App\Services\permisos;
use Auth;

class CorteController extends Controller
{
    public function create(Request $request)
    {
        $corte = corte::with('muestrascorte')->where('solicitud_id', $request->solicitud_id)->first();
        $solicitud_id = $request->solicitud_id;

        if ($corte) {
            $corte->fecha_corte = \Carbon\Carbon::parse($corte->fecha_corte)->format('Y-m-d');
        }


       // return $corte;
       return view('admin.cortes.create', compact('solicitud_id', 'corte'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validacion
        $this->validate($request, [
            
            'solicitud_id' => 'required|string',
            'cortadora' => 'required|string',
            'fecha_corte' => 'required|string',
            'operador' => 'required|string',
            'muestra' => 'required|string',            
          ]);

            $corte = new corte;
            $corte->solicitud_id = $request->solicitud_id;
            $corte->cortadora = $request->cortadora;
            $corte->fecha_corte = $request->fecha_corte;
            $corte->operador = $request->operador;
            $corte->cantidad = $request->cantidad;
            $corte->muestra = $request->muestra;
            $corte->espesor = $request->espesor;
            $corte->espesor2 = $request->espesor2;
            $corte->espesor3 = $request->espesor3;
            $corte->ancho_bolsa_plan = $request->ancho_bolsa_plan;
            $corte->ancho_bolsa_min = $request->ancho_bolsa_min;
            $corte->ancho_bolsa_max = $request->ancho_bolsa_max;
            $corte->alto_plan = $request->alto_plan;
            $corte->alto_min = $request->alto_min;
            $corte->alto_max = $request->alto_max;
            $corte->fuelle_plan = $request->fuelle_plan;
            $corte->fuelle_min = $request->fuelle_min;
            $corte->fuelle_max = $request->fuelle_max;
            $corte->save();

                //redireccion
       return back()->with('mensaje', 'Proceso de corte Agregado con exito!');
    }

    /**
     * Display the specified resource.
     */
    public function show(corte $corte)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(corte $corte)
    {
        $corte->completado = 1;
        $corte->save();

        return redirect('solicituds')->with('mensaje', 'Proceso Corte Finalizado');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, corte $corte)
    {
        $corte->cortadora = $request->cortadora;
            $corte->fecha_corte = $request->fecha_corte;
            $corte->operador = $request->operador;
            $corte->cantidad = $request->cantidad;
            $corte->muestra = $request->muestra;
            $corte->espesor = $request->espesor;
            $corte->espesor2 = $request->espesor2;
            $corte->espesor3 = $request->espesor3;
            $corte->ancho_bolsa_plan = $request->ancho_bolsa_plan;
            $corte->ancho_bolsa_min = $request->ancho_bolsa_min;
            $corte->ancho_bolsa_max = $request->ancho_bolsa_max;
            $corte->alto_plan = $request->alto_plan;
            $corte->alto_min = $request->alto_min;
            $corte->alto_max = $request->alto_max;
            $corte->fuelle_plan = $request->fuelle_plan;
            $corte->fuelle_min = $request->fuelle_min;
            $corte->fuelle_max = $request->fuelle_max;
            $corte->save();

                //redireccion
       return back()->with('mensaje', 'Proceso de corte Agregado con exito!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(corte $corte)
    {
        //
    }
}