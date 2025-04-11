<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\DataForBandCurve;
class EVD_stats extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'EVD stats';
    protected static ?string $navigationLabel = 'EVD stats';
    protected static ?string $navigationGroup = 'Reconciliations';
    protected static string $view = 'filament.pages.e-v-d_stats';
    public $data;
    public function mount()
    {
        // Récupérer les données de la table pour la courbe
        $this->data = DataForBandCurve::all();
    }

}
