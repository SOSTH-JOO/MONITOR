<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class ParametreSecurite extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'Parametre de Securité';
    protected static ?string $navigationLabel = 'Parametre de Securité';
    protected static ?string $navigationGroup = 'Paramètres';
    protected static string $view = 'filament.pages.parametre-securite';
}
