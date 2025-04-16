<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function log()
    {
        return view('pages.parametres.log'); // La vue 'home.blade.php' sera affichée
    }

    public function settingsSecurity()
    {
        return view('pages.parametres.settingssecurity'); // La vue 'home.blade.php' sera affichée
    }

    public function compte()
    {
        return view('pages.parametres.compte'); // La vue 'home.blade.php' sera affichée
    }
}
