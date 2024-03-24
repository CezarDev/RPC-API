<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('senha123'),
        ]);

        User::create([
            'name' => 'Joao da Silva',
            'email' => 'joao@email.com',
            'password' => Hash::make('senha123'),
        ]);

        User::create([
            'name' => 'Maria de Souza',
            'email' => 'maria@email.com',
            'password' => Hash::make('senha123'),
        ]);
    }
}
