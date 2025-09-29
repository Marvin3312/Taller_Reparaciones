<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Usuario::create([
            'username' => 'admin',
            'password_hash' => Hash::make('admin_123'),
            'rol' => 'Admin',
            'activo' => true,
        ]);

        Usuario::create([
            'username' => 'tecnico1',
            'password_hash' => Hash::make('password'),
            'rol' => 'tecnico',
            'activo' => true,
        ]);
    }
}