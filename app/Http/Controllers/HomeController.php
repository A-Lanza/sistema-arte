<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\config;
use App\Models\User;
use App\Models\product;
use App\Models\cliente;
use App\Models\solicitud;
use App\Services\permisos;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct(Permisos $permisosService)
    {
        $this->middleware('auth');
        $this->permisosService = $permisosService;
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $config = config::first();
        session(['config' => $config]);

       /* $usu = User::count();
        $productos = product::count();
        $solicituds = solicitud::count();
        $clientes = cliente::count();
        $soli_completa = solicitud::where('estado', 1)->count();
        $soli_pendiente = solicitud::where('estado', null)->count();

        $p1 = solicitud::sum('p1');
        $p2 = solicitud::sum('p2');
        $p5 = solicitud::sum('p5');
        $p3 = solicitud::sum('p3');
        $p4 = solicitud::sum('p4');

        $permisos = $this->permisosService->permisos();*/

        return view('home');
    }
}
