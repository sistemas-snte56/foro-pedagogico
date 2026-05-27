<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    protected $table = 'mesas';
    protected $fillable = [
        'nivel_educativo',
        'numero',
        'capacidad',
        'ocupados'
    ];
    public function disponible(): bool
    {
        return $this->ocupados < $this->capacidad;
    }
}