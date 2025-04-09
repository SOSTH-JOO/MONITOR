<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
