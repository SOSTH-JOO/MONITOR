<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Mon_profil extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'Mon Profil';
    protected static ?string $navigationLabel = 'Mon Profil';
    protected static ?string $navigationGroup = 'Paramètres';
    protected static string $view = 'filament.pages.mon_profil';
}
