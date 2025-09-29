<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    use HasFactory;

    protected $table = 'equipo';
    protected $primaryKey = 'id_equipo';
    protected $fillable = ['tipo', 'modelo', 'num_serie', 'id_marca'];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca', 'id_marca');
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'id_equipo', 'id_equipo');
    }
}
