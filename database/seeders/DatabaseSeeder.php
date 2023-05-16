<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create(); // Cria 10 usuários fake de exemplo, não necessário

        // Seeder para usuarios
        \App\Models\User::factory()->create([
            'name' => 'Usuário #1',
            'email' => 'usuario1@exemplo.com',
            'password' => Hash::make('1234')
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Usuário #2',
            'email' => 'usuario2@exemplo.com',
            'password' => Hash::make('1234')
        ]);

        // Seeder para reservas
        \App\Models\ReservaEfetuada::create([
            'id_usuario' => 1, // Usuário 1
            'numero_da_mesa' => 5,
            'dia' => date('Y-m-d'),
            'horario' => '21:00'
        ]);

        \App\Models\ReservaEfetuada::create([
            'id_usuario' => 2, // Usuário 2
            'numero_da_mesa' => 2,
            'dia' => date('Y-m-d', strtotime('+1 day')), // reserva para o dia seguinte
            'horario' => '23:50'
        ]);
    }
}
