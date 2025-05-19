<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        Usuario::create([
            'nome' => 'Administrador',
            'email' => 'admin@clinica.com',
            'senha' => Hash::make('admin123'), // escolha uma senha segura
            'tipo' => 'admin', // campo que identifica o tipo de usuário
        ]);
    }
}
