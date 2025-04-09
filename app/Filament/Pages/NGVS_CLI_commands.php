<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class NGVS_CLI_commands extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $title = 'NGVS CLI commands';
    protected static ?string $navigationLabel = 'NGVS CLI commands';
    protected static ?string $navigationGroup = 'Memo OCS';
    protected static string $view = 'filament.pages.n-g-v-s_-c-l-i_commands';
}
