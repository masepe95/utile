<?php

namespace App\Filament\Resources\MNSLeadsResource\Pages;

use App\Filament\Resources\MNSLeadsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMNSLeads extends ListRecords
{
    protected static string $resource = MNSLeadsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
