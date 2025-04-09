<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class BCsheets extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $title = 'BCsheet';
    protected static ?string $navigationLabel = 'BCsheets';
    protected static ?string $navigationGroup = 'Services';

    protected static string $view = 'filament.pages.b-csheets';
}
