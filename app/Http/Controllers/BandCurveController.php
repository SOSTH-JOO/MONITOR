<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataForBandCurve;

class BandCurveController extends Controller
{
    public function index()
    {
        // Récupérer les données de la table
        $data = DataForBandCurve::all();

        // Passer les données à la vue
        return view('band-curve', compact('data'));
    }
}
