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

        \App\Models\User::factory()->create([
            'name' => 'Usuário de Teste',
            'email' => 'test@example.com',
            'password' => Hash::make('1234')
        ]);
    }
}
