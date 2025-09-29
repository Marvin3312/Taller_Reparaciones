<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table = 'servicio';
    protected $primaryKey = 'id_servicio';
    protected $fillable = [
        'fecha_recepcion', 
        'estado', 
        'diagnostico', 
        'solucion', 
        'id_equipo', 
        'id_tecnico'
    ];

    public function tecnico()
    {
        return $this->belongsTo(Tecnico::class, 'id_tecnico', 'id_tecnico');
    }

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'id_equipo', 'id_equipo');
    }
}
