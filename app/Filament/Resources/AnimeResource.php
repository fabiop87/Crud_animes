<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnimeResource\Pages;
use App\Filament\Resources\AnimeResource\RelationManagers;
use App\Models\Anime;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;



class AnimeResource extends Resource
{
    protected static ?string $model = Anime::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nome')
                    ->required()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('imagem')->image()->directory('images')
                    ->dehydrated(fn ($state) => filled($state)),
                Forms\Components\TextInput::make('episodios')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('estreia')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('musicas')
                    ->required(),
            ]);
    }
// add o APP_URL certo para funcionar a imagem
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nome'),
                Tables\Columns\ImageColumn::make('imagem')->size(100),
                Tables\Columns\TextColumn::make('episodios'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('estreia'),
                Tables\Columns\TextColumn::make('musicas'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAnimes::route('/'),
            'create' => Pages\CreateAnime::route('/create'),
            'view' => Pages\ViewAnime::route('/{record}'),
            'edit' => Pages\EditAnime::route('/{record}/edit'),
        ];
    }
}
