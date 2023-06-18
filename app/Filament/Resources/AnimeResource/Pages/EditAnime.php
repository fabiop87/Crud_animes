<?php

namespace App\Filament\Resources\AnimeResource\Pages;

use App\Filament\Resources\AnimeResource;
use App\Models\Anime;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;

class EditAnime extends EditRecord
{
    protected static string $resource = AnimeResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make()
                ->after(function(Anime $record){
                //delete Single
                if ($record->imagem) {
                    Storage::disk('public')->delete($record->imagem);
                 }
            }),
        ];
    }
}
