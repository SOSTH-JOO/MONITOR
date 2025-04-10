<?php

namespace App\Filament\Pages;
use App\Filament\Widgets\StatsOverview;
use Filament\Pages\Page;

class Accueil extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';

    protected static string $view = 'filament.pages.accueil';

    protected function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class,
        ];
    }
}
