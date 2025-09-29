<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tecnico;
use App\Models\Usuario;

class TecnicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tecnicoUser = Usuario::where('username', 'tecnico1')->first();

        if ($tecnicoUser) {
            Tecnico::create([
                'nombre' => 'Juan Perez',
                'especialidad' => 'Hardware',
                'correo' => 'juan.perez@example.com',
                'telefono' => '123456789',
                'id_usuario' => $tecnicoUser->id_usuario,
            ]);
        }
    }
}