<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Delegacion extends Model
{
    protected $table = 'delegaciones';
    protected $fillable = [
        'region_id',
        'delegacion',
        'sede',
        'nivel_id',
    ];

    public function region() : BelongsTo
    {
        return $this->belongsTo(Region::class);
    }

    public function nivel() : BelongsTo
    {
        return $this->belongsTo(Nivel::class);
    }

    public function getNombreCompletoAttribute()
    {
        return "{$this->delegacion} - {$this->nivel->nombre} - {$this->sede}";
    }
}
