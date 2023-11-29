<?php

namespace App\Filament\Resources\MNSLeadsResource\Pages;

use App\Filament\Resources\MNSLeadsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMNSLeads extends EditRecord
{
    protected static string $resource = MNSLeadsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
