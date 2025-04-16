<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ErsBalanceCheckSeeder extends Seeder
{
    /**
     * Exécuter le seeder.
     *
     * @return void
     */
    public function run()
    {
        // Liste des types de revendeurs
        $resellerTypes = ['gb', 'Po', 'ago', 'pin'];

        // Insertion des données dans la table ers_balance_check
        foreach ($resellerTypes as $resellerType) {
            DB::connection('mysql_second')->table('ers_balance_check')->insert([
                'calculatedtime' => Carbon::now(),  // Date et heure actuelle
                'resellertype' => $resellerType,     // Le type de revendeur
                'nbre' => rand(1, 100),              // Nombre aléatoire pour nbre
                'bal' => rand(1000, 5000) / 100,     // Solde aléatoire pour bal
                'nbre14' => rand(1, 100),            // Nombre aléatoire pour nbre14
                'bal14' => rand(1000, 5000) / 100,   // Solde aléatoire pour bal14
                'gap' => rand(10, 50) / 10,          // Écart aléatoire pour gap
                'gapbal' => rand(10, 50) / 10,       // Écart de solde aléatoire pour gapbal
                'created_at' => Carbon::now(),       // Date de création
                'updated_at' => Carbon::now()        // Date de mise à jour
            ]);
        }
    }
}
