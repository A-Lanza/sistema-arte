<?php

namespace App\Services;

use App\Models\permiso;
use Auth;
use Illuminate\Support\Facades\Session;
 
class Permisos
{
    public function permisos()
    {
       $permisos = permiso::join('permission_rols as pr', 'permisos.id', '=', 'pr.permission_id')
                    ->select('permisos.menu')
                    ->where('pr.role_id', Auth::user()->rol)
                    ->get();

                    Session::put('permisosUsuario', $permisos);
                    return $permisos;
    }

    public function verificar($usuario)
    {
       $permisos = permiso::join('permission_rols as pr', 'permisos.id', '=', 'pr.permission_id')
                    ->select('pr.crear', 'pr.verTodo', 'pr.ver', 'pr.edit', 'pr.destroy')
                    ->where([['pr.role_id', Auth::user()->rol],['permisos.menu', $usuario['menu']]])
                    ->first();

                    return $permisos;
    }
    
}
