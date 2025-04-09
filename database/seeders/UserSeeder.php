<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Assurez-vous d'importer le modèle User
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'user_id' => Str::uuid(), // Générer un UUID pour 'user_id'
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('password123'), // Hashage du mot de passe
            'failed_login' => 0, // Initialisation des échecs de connexion
            'actif' => 1, // Actif
            'role_id' => 1, // Assurez-vous que le rôle existe
        ]);
    }
}
