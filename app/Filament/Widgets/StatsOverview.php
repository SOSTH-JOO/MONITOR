<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User;
use App\Models\Memo;


class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('total Users' ,User::count() )
            ->description('')
            ->descriptionIcon('')
            ->color('success')
            ->chart([9, 3, 4, 4, 4]),

            Stat::make('total Memos' ,Memo::count() )
            ->description('')
            ->descriptionIcon('')
            ->color('success')
            ->chart([9, 3, 4, 4, 4]),



        ];
    }




    // // On ne l’affiche pas dans le dashboard global
    // public static function canView(): bool
    // {
    //     return false;
    // }
}
