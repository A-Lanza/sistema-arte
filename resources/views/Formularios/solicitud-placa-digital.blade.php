<!-- resources/views/solicitudes/solicitud-placa-digital.blade.php -->

@extends('layouts.app') <!-- Cambia 'app' por el layout que desees usar -->

@section('content')
<div class="container" style="background-color: #d3d3d3; padding: 20px;">
    <h2>SOLICITUD DE PROCESO DE PLACA DIGITAL</h2>
    <form action="{{ route('solicitudes.placa.store') }}" method="POST">
        @csrf

        <!-- Cliente -->
        <div class="form-group">
            <label for="cliente">Cliente:</label>
            <select id="cliente" name="cliente" class="form-control">
                <!-- Opciones del cliente -->
            </select>
        </div>

        <!-- Referencia -->
        <div class="form-group">
            <label for="referencia">Referencia:</label>
            <select id="referencia" name="referencia" class="form-control">
                <!-- Opciones ancladas al cliente -->
            </select>
        </div>

        <!-- OT -->
        <div class="form-group">
            <label for="ot">OT:</label>
            <input type="number" class="form-control" id="ot" name="ot" required>
        </div>

        <!-- Cilindro -->
        <div class="form-group">
            <label for="cilindro">Cilindro:</label>
            <input type="number" step="0.01" class="form-control" id="cilindro" name="cilindro">
        </div>

        <!-- Colores -->
        <div class="form-group">
            <label for="colores">Colores:</label>
            <select id="colores" name="colores[]" class="form-control" multiple>
                <option value="C">C</option>
                <option value="M">M</option>
                <option value="Y">Y</option>
                <option value="K">K</option>
                <option value="W">W</option>
            </select>
        </div>

        <!-- Cant. Pantones -->
        <div class="form-group">
            <label for="cant_pantones">Cant. Pantones:</label>
            <select id="cant_pantones" name="cant_pantones" class="form-control">
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>

        <!-- Pantones -->
        <div class="form-group">
            <label for="pantones">Pantones:</label>
            <input type="text" class="form-control" id="pantones" name="pantones" maxlength="20">
        </div>

        <!-- Pistas -->
        <div class="form-group">
            <label for="pistas">Pistas:</label>
            <input type="number" class="form-control" id="pistas" name="pistas" required>
        </div>

        <!-- Motivo -->
        <div class="form-group">
            <label for="motivo">Motivo:</label>
            <select id="motivo" name="motivo" class="form-control">
                <!-- Opciones de motivo -->
            </select>
        </div>

        <!-- Prioridad -->
        <div class="form-group">
            <label for="prioridad">Prioridad:</label>
            <select id="prioridad" name="prioridad" class="form-control">
                <option value="maquina">Trabajo en máquina</option>
                <option value="montar">Trabajo a montar</option>
                <option value="proximo">Próximo Tiraje</option>
            </select>
        </div>

        <!-- Fecha y hora -->
        <div class="form-group">
            <label for="fecha">Fecha:</label>
            <input type="datetime-local" class="form-control" id="fecha" name="fecha">
        </div>

        <!-- Observaciones -->
        <div class="form-group">
            <label for="observaciones">Observaciones:</label>
            <textarea class="form-control" id="observaciones" name="observaciones" rows="4" maxlength="255"></textarea>
        </div>

        <!-- Responsable de Impresión -->
        <div class="form-group">
            <label for="responsable_impresion">Responsable de Impresión:</label>
            <input type="text" class="form-control" id="responsable_impresion" name="responsable_impresion" maxlength="50">
        </div>

        <!-- Responsable de Fotomecánica -->
        <div class="form-group">
            <label for="responsable_fotomecanica">Responsable de Fotomecánica:</label>
            <input type="text" class="form-control" id="responsable_fotomecanica" name="responsable_fotomecanica" maxlength="50">
        </div>

        <!-- Botón de Envío -->
        <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
    </form>
</div>
@endsection
