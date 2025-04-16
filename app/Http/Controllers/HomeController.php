<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memo;

class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil.
     *
     * @return \Illuminate\View\View
     */


     public function index()
    {
        return view('pages.Accueil'); // La vue 'home.blade.php' sera affichée
    }
    public function Error404()
    {
        return view('errors.404'); // La vue 'home.blade.php' sera affichée
    }
    public function Error419()
    {
        return view('errors.419'); // La vue 'home.blade.php' sera affichée
    }
    public function Error403()
    {
        return view('errors.403'); // La vue 'home.blade.php' sera affichée
    }




    public function memo()
    {
        // Récupérer tous les mémos avec leurs étapes et commandes associées
        $memos = Memo::with('etapes.commandes')->get();

        return view('filament.memos.index', compact('memos'));


}

public function chargement()
{


    return view('pages.chargement' );


}



}
