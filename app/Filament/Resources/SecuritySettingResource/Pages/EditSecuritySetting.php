<?php

namespace App\Filament\Resources\SecuritySettingResource\Pages;

use App\Filament\Resources\SecuritySettingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSecuritySetting extends EditRecord
{
    protected static string $resource = SecuritySettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
