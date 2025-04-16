<?php

use Illuminate\Database\Seeder;
use App\Models\ResumeAirtimeEwpOcs;
use Carbon\Carbon;

class ResumeAirtimeEwpOcsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'dateid' => '2024-04-01',
                'ewp_total' => 100,
                'ewp_amount' => 25000.50,
                'ocs_total' => 80,
                'ocs_amount' => 20000.75,
                'gap_total' => 20,
                'gap_amount' => 5000.25,
            ],
            [
                'dateid' => '2024-04-02',
                'ewp_total' => 120,
                'ewp_amount' => 30000.00,
                'ocs_total' => 100,
                'ocs_amount' => 25000.00,
                'gap_total' => 20,
                'gap_amount' => 5000.00,
            ],
            // Ajoute autant de lignes que nécessaire
        ];

        foreach ($data as $row) {
            ResumeAirtimeEwpOcs::create($row);
        }
    }
}
