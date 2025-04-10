<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Memo;
class memo_ocs extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Services';
    protected static string $view = 'filament.pages.memo_ocs';

    public $memos;
    public function mount()
    {
        $this->memos = Memo::with('etapes.commandes')->get();
    }
}
