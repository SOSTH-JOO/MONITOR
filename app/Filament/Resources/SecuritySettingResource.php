<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SecuritySettingResource\Pages;
use App\Models\SecuritySetting;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;

class SecuritySettingResource extends Resource
{
    protected static ?string $model = SecuritySetting::class;
    protected static ?string $navigationGroup = 'Paramètres';

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('password_history')
                    ->label('Historique des mots de passe')
                    ->numeric()
                    ->default(24)
                    ->required(),

                Forms\Components\TextInput::make('password_max_age')
                    ->label('Âge maximal du mot de passe (jours)')
                    ->numeric()
                    ->default(30)
                    ->required(),

                Forms\Components\TextInput::make('password_min_length_normal')
                    ->label('Longueur minimale du mot de passe normal')
                    ->numeric()
                    ->default(10)
                    ->required(),

                Forms\Components\TextInput::make('password_min_length_admin')
                    ->label('Longueur minimale du mot de passe admin')
                    ->numeric()
                    ->default(14)
                    ->required(),

                Forms\Components\TextInput::make('password_complexity')
                    ->label('Complexité du mot de passe')
                    ->default('A-Z, a-z, 0-9, !$#%')
                    ->required(),

                Forms\Components\TextInput::make('account_lockout_threshold')
                    ->label('Seuil de verrouillage du compte')
                    ->numeric()
                    ->default(10)
                    ->required(),

                Forms\Components\TextInput::make('lockout_counter_period')
                    ->label('Période du compteur de verrouillage (minutes)')
                    ->numeric()
                    ->default(30)
                    ->required(),

                Forms\Components\TextInput::make('session_expiry_minutes')
                    ->label('Expiration de la session (minutes)')
                    ->numeric()
                    ->default(15)
                    ->required(),

                Forms\Components\Toggle::make('avoid_simultaneous_sessions')
                    ->label('Éviter les sessions simultanées')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('password_history')
                    ->label('Historique des mots de passe')
                    ->sortable(),

                TextColumn::make('password_max_age')
                    ->label('Âge maximal du mot de passe (jours)')
                    ->sortable(),

                TextColumn::make('password_min_length_normal')
                    ->label('Longueur minimale du mot de passe normal')
                    ->sortable(),

                TextColumn::make('password_min_length_admin')
                    ->label('Longueur minimale du mot de passe admin')
                    ->sortable(),

                TextColumn::make('password_complexity')
                    ->label('Complexité du mot de passe')
                    ->sortable(),

                TextColumn::make('account_lockout_threshold')
                    ->label('Seuil de verrouillage du compte')
                    ->sortable(),

                TextColumn::make('lockout_counter_period')
                    ->label('Période du compteur de verrouillage (minutes)')
                    ->sortable(),

                TextColumn::make('session_expiry_minutes')
                    ->label('Expiration de la session (minutes)')
                    ->sortable(),

                BooleanColumn::make('avoid_simultaneous_sessions')
                    ->label('Éviter les sessions simultanées')
                    ->sortable(),
            ])
            ->filters([
                // Vous pouvez ajouter des filtres ici si nécessaire
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSecuritySettings::route('/'),
            'create' => Pages\CreateSecuritySetting::route('/create'),
            'edit' => Pages\EditSecuritySetting::route('/{record}/edit'),
        ];
    }
}
