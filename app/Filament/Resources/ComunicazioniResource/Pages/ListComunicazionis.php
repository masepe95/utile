<?php

namespace App\Filament\Resources\ComunicazioniResource\Pages;

use App\Filament\Resources\ComunicazioniResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListComunicazionis extends ListRecords
{
    protected static string $resource = ComunicazioniResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
