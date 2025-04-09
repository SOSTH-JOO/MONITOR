<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('user_id')
                    ->label('UUID')
                    ->unique(ignoreRecord: true)
                    ->disabled(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('tel')
                    ->tel()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255)
                    ->afterStateUpdated(function ($state, $set) {
                        // Vérifier ici si le mot de passe doit être haché manuellement, si nécessaire
                        return Hash::make($state); // Hachage automatique ici si nécessaire
                    }),


                    Forms\Components\Select::make('statut')
                    ->label('Statut')
                    ->options([
                        1 => 'Actif',
                        0 => 'Inactif',
                        2 => 'Dormant',
                    ])
                    ->required(),

                Forms\Components\TextInput::make('service')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')->label('UUID')->toggleable(),
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('email')->searchable(),
                Tables\Columns\TextColumn::make('tel')->toggleable(),
                Tables\Columns\TextColumn::make('service')->toggleable(),
                Tables\Columns\TextColumn::make('statut')
                ->label('Statut')
                ->formatStateUsing(function ($state) {
                    return match ((int) $state) {
                        0 => 'Inactif',
                        1 => 'Actif',
                        2 => 'Dormant',
                        default => 'Inconnu',
                    };
                }),
                            Tables\Columns\TextColumn::make('last_login')->dateTime()->toggleable(),
                Tables\Columns\TextColumn::make('failed_login')->label('Échecs')->toggleable(),
            ])
            ->filters([
                //
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
