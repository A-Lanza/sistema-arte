<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    use HasFactory;

    // Especifica la tabla que este modelo utilizará
    protected $table = 'form_planchas';

    // Define los campos que se pueden asignar masivamente
    protected $fillable = [
        'cliente', 'op', 'pistas', 'referencia',
        'color', 'piso', 'cantidad', 'ancho', 'alto'
    ];

    // Sobrescribe el método boot para definir comportamiento al crear registros
    protected static function boot()
    {
        parent::boot();

        // Antes de crear un nuevo registro, asigna automáticamente un número de solicitud incremental
        static::creating(function ($model) {
            // Obtiene el último registro ordenado por el campo 'numero_solicitud' en orden descendente
            $lastSolicitud = static::orderBy('numero_solicitud', 'desc')->first();
            // Asigna el número de solicitud incrementando en 1 si ya existe, o lo asigna a 1 si no hay registros previos
            $model->numero_solicitud = $lastSolicitud ? $lastSolicitud->numero_solicitud + 1 : 1;
        });
    }
}
