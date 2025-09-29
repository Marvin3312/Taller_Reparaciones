<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    use HasFactory;

    protected $table = 'tecnico';
    protected $primaryKey = 'id_tecnico';
    protected $fillable = ['nombre', 'especialidad', 'correo', 'telefono', 'id_usuario'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    public function servicios()
    {
        return $this->hasMany(Servicio::class, 'id_tecnico', 'id_tecnico');
    }
}
