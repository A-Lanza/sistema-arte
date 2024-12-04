<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormularioController;

Route::get('/', function () {
    return view('auth.login');
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/*Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);

Route::get('/probar-conexion', [FormularioController::class, 'probarConexion']);

// Ruta para mostrar el formulario de solicitud de planchas
Route::get('/solicitud-planchas', [FormularioController::class, 'showSolicitudPlanchas'])->name('solicitud.planchas');

// Ruta para guardar los datos del formulario de solicitud de planchas
Route::post('/guardar-solicitud', [FormularioController::class, 'guardar'])->name('guardarSolicitud');

// Ruta para mostrar la vista de login
Route::get('/', function () {
    return view('auth.login');
});

//Route::get('/solicitud-placa-digital', [FormularioController::class, 'showSolicitudPlacaDigital'])->name('solicitud.placaDigital');
//Route::post('/solicitud-placa-digital', [FormularioController::class, 'storeSolicitudPlacaDigital']);
*/