<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class log_surveillance extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'Log de Surveillance';
    protected static ?string $navigationLabel = 'Log de Surveillance';
    protected static ?string $navigationGroup = 'Paramètres';
    protected static string $view = 'filament.pages.log_surveillance';
}
