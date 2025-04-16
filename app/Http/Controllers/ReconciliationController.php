<?php

namespace App\Http\Controllers;

use App\Models\ResumeAirtimeEwpOcs;
use Illuminate\Http\Request;
use App\Models\ErsBalanceCheck;
class ReconciliationController extends Controller
{
    public function Ewc_Ecc22_airtime()
    {
        $data = ResumeAirtimeEwpOcs::orderBy('dateid', 'desc')->get();
        return view('pages.reconciliations.ewc_ec22_airtime',compact('data')); // La vue 'home.blade.php' sera affichée
    }

    public function Ewc_Ecc22_bundle()
    {
        return view('pages.reconciliations.ewc_ec22_bundle'); // La vue 'home.blade.php' sera affichée
    }


    public function Evd_stats()
    {

         // Récupérer les données par date la plus récente
         $data = ErsBalanceCheck::orderBy('calculatedtime', 'desc')->get();

        return view('pages.reconciliations.evd_stats',compact('data') ); // La vue 'home.blade.php' sera affichée
    }


}
