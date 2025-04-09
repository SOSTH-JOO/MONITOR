<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class User_list_extraction extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $title = 'USER LIST EXTRACTION';
    protected static ?string $navigationLabel = 'user list Extraction';
    protected static ?string $navigationGroup = 'Memo OCS';
    protected static string $view = 'filament.pages.user_list_extraction';
}
