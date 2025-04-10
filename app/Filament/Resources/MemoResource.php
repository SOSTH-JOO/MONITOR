<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MemoResource\Pages;
use App\Models\Memo;
use App\Models\Etape;
use App\Models\Commande;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;

class MemoResource extends Resource
{
    protected static ?string $model = Memo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Champ pour le titre du memo
                Forms\Components\TextInput::make('titre')
                    ->label('Titre')
                    ->required()
                    ->maxLength(255),

                // Champ pour l'explication du titre
                Forms\Components\TextInput::make('explication_titre')
                    ->label('Explication du Titre')
                        
                    ->maxLength(255),

                // Section pour les étapes
                Forms\Components\Repeater::make('etapes') // Utilisation d'un Repeater pour les étapes
                    ->relationship('etapes') // Relation avec 'etapes' dans le modèle Memo
                    ->schema([
                        // Champ pour le nom de l'étape
                        Forms\Components\TextInput::make('nom_etape')
                            ->label('Nom de l\'étape')
                            ->required()
                            ->maxLength(255),

                        // Champ pour la description de l'étape
                        Forms\Components\Textarea::make('texte_etape')
                            ->label('Description de l\'étape')
                           ,

                        // Repeater imbriqué pour les commandes de cette étape
                        Forms\Components\Repeater::make('commandes') // Utilisation d'un Repeater pour les commandes de l'étape
                            ->relationship('commandes') // Relation avec 'commandes' dans le modèle Etape
                            ->schema([
                                Forms\Components\TextInput::make('commande')
                                    ->label('Commande')
                                    ->required()
                                    ->maxLength(255),
                            ])
                            ->createItemButtonLabel('Ajouter une commande'),
                    ])
                    ->createItemButtonLabel('Ajouter une étape'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titre')
                    ->label('Titre')
                    ->searchable(),

                TextColumn::make('explication_titre')
                    ->label('Explication du Titre')
                    ->limit(50),

                TextColumn::make('created_at')
                    ->label('Date de création')
                    ->date()
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
            // Vous pouvez ajouter des relations ici si nécessaire, comme la relation 'etapes' et 'commandes'
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMemos::route('/'),
            'create' => Pages\CreateMemo::route('/create'),
            'edit' => Pages\EditMemo::route('/{record}/edit'),
        ];
    }
}
