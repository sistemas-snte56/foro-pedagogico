<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Participante extends Model
{
    protected $table = 'participantes';
    protected $fillable = [
            'apellido_paterno',
            'apellido_materno',
            'nombre',
            'genero', 
            'nivel',
            'delegacion_id',
            'clave_centro_trabajo',
            'rfc',
            'numero_personal',
            'mesa_id',
    ];

    public function mesa(): BelongsTo
    {
        return $this->belongsTo(Mesa::class);
    }

    public function delegacion(): BelongsTo
    {
        return $this->belongsTo(Delegacion::class);
    }
}
