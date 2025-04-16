<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function Bcsheets()
    {
        return view('pages.service.Bcsheets'); // La vue 'home.blade.php' sera affichée
    }

    public function memos()
    {

        return view('pages.service.memos'); // La vue 'home.blade.php' sera affichée
    }

    public function memo()
    {

        return view('filament.memos.index', compact('memos'));


}

    public function Incidents()
    {
        return view('pages.service.Incidents'); // La vue 'home.blade.php' sera affichée
    }

    public function Xtratime()
    {
        return view('pages.service.Xtratime'); // La vue 'home.blade.php' sera affichée
    }
    public function SDP()
    {
        return view('pages.service.SDP'); // La vue 'home.blade.php' sera affichée
    }
}
