<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class DataForBandCurveSeeder extends Seeder
{
    public function run()
    {
        // Ajouter des données de test
        DB::connection('mysql_second')->table('data_for_band_curve')->insert([
            ['value1' => 10, 'value2' => 20],
            ['value1' => 15, 'value2' => 25],
            ['value1' => 20, 'value2' => 30],
            ['value1' => 25, 'value2' => 35],
            ['value1' => 30, 'value2' => 40],
            // Vous pouvez ajouter d'autres lignes de données ici
        ]);
    }
}
