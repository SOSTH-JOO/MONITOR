<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ResumeAirtimeEwpOcsSeeder extends Seeder
{
    /**
     * Exécute le seeder.
     *
     * @return void
     */
    public function run()
    {
        // Données simulées (à remplacer si besoin par des données réelles)
        $resumeData = [
            [
                'dateid' => '2025-05-01',
                'ewp_total' => 110,
                'ewp_amount' => 24300.75,
                'ocs_total' => 90,
                'ocs_amount' => 20150.60,
                'gap_total' => 20,
                'gap_amount' => 50000.15
            ],
            [
                'dateid' => '2025-04-02',
                'ewp_total' => 150,
                'ewp_amount' => 30000.00,
                'ocs_total' => 100,
                'ocs_amount' => 25000.00,
                'gap_total' => 50,
                'gap_amount' => -1000.00
            ],
            [
                'dateid' => '2025-04-02',
                'ewp_total' => 150,
                'ewp_amount' => 30000.00,
                'ocs_total' => 100,
                'ocs_amount' => 25000.00,
                'gap_total' => 50,
                'gap_amount' => -5000.00
            ],
            [
                'dateid' => '2025-03-28',
                'ewp_total' => 120,
                'ewp_amount' => 25000.50,
                'ocs_total' => 95,
                'ocs_amount' => 21000.20,
                'gap_total' => 25,
                'gap_amount' => 4000.00
            ],
            [
                'dateid' => '2025-03-27',
                'ewp_total' => 140,
                'ewp_amount' => 28000.75,
                'ocs_total' => 110,
                'ocs_amount' => 24000.80,
                'gap_total' => 30,
                'gap_amount' => 3500.00
            ],
            [
                'dateid' => '2025-03-26',
                'ewp_total' => 130,
                'ewp_amount' => 27000.60,
                'ocs_total' => 105,
                'ocs_amount' => 23500.90,
                'gap_total' => 25,
                'gap_amount' => 1500.00
            ],
            [
                'dateid' => '2025-03-25',
                'ewp_total' => 160,
                'ewp_amount' => 32000.40,
                'ocs_total' => 115,
                'ocs_amount' => 26000.00,
                'gap_total' => 45,
                'gap_amount' => 2000.00
            ],
            [
                'dateid' => '2025-03-24',
                'ewp_total' => 125,
                'ewp_amount' => 27000.00,
                'ocs_total' => 105,
                'ocs_amount' => 23000.00,
                'gap_total' => 20,
                'gap_amount' => 3000.00
            ],
            [
                'dateid' => '2025-03-23',
                'ewp_total' => 135,
                'ewp_amount' => 29000.80,
                'ocs_total' => 108,
                'ocs_amount' => 24000.40,
                'gap_total' => 27,
                'gap_amount' => 1800.00
            ],
            [
                'dateid' => '2025-03-22',
                'ewp_total' => 115,
                'ewp_amount' => 24000.90,
                'ocs_total' => 100,
                'ocs_amount' => 22000.10,
                'gap_total' => 15,
                'gap_amount' => 3500.00
            ]
        ];

        foreach ($resumeData as $data) {
            DB::connection('mysql_second')->table('resume_airtime_ewp_ocs')->insert([
                'dateid' => $data['dateid'],
                'ewp_total' => $data['ewp_total'],
                'ewp_amount' => $data['ewp_amount'],
                'ocs_total' => $data['ocs_total'],
                'ocs_amount' => $data['ocs_amount'],
                'gap_total' => $data['gap_total'],
                'gap_amount' => $data['gap_amount'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
