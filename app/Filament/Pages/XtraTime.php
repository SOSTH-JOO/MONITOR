<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class XtraTime extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'XtraTime';
    protected static ?string $navigationLabel = 'XtraTime';
    protected static ?string $navigationGroup = 'Services';

    protected static string $view = 'filament.pages.xtra-time';
}
