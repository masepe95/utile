<?php

namespace App\Filament\Resources\ComunicazioniResource\Pages;

use App\Filament\Resources\ComunicazioniResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditComunicazioni extends EditRecord
{
    protected static string $resource = ComunicazioniResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
