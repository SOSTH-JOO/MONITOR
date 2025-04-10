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
    public function Error404()
    {
        return view('errors.404'); // La vue 'home.blade.php' sera affichée
    }




    public function memo()
    {
        // Récupérer tous les mémos avec leurs étapes et commandes associées
        $memos = Memo::with('etapes.commandes')->get();

        return view('filament.memos.index', compact('memos'));


}



}
