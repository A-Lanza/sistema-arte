@extends('layouts.app')

@section('content')
<?php
use App\Models\config;

$config = config::first();
?>
<div class="d-flex justify-content-center align-items-center vh-100"> 
    <div class="card shadow-lg" style="width: 500px; padding: 20px;">
        <div class="card-body p-4">
            <div class="text-center mb-4">
                <h1 class="mb-1">Solicitudes</h1>
                <!--<h3 class="text-muted mb-3">Solicitudes</h3>-->
                <img src="{{ asset('images/LogoInplasa.jpg') }}" alt="Logotipo" style="width: 150px; height: auto;">
            </div>
            
            <form method="POST" action="{{ route('login') }}" class="authentication-form">
                @csrf

                <div class="mb-4">
                    <label class="form-label">Correo</label>
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" class="form-control @error('codigo') is-invalid @enderror" id="codigo" placeholder="Ingrese su correo electrónico" name="codigo" value="{{ old('codigo') }}" required autocomplete="codigo" autofocus style="font-size: 1.1em;">
                        @error('codigo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="mb-4">
                    <label class="form-label">Contraseña</label>
                    <div class="input-group">
                        <span class="input-group-text bg-primary text-white">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Ingrese su contraseña" name="password" required autocomplete="current-password" style="font-size: 1.1em;">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="mb-3 form-check text-center">
                    <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                    <label class="form-check-label" for="checkbox-signin">Recordarme</label>
                </div>

                <div class="text-center">
                    <button class="btn btn-primary btn-lg w-100" type="submit" style="font-size: 1.2em;">Iniciar Sesión</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
