<?php

namespace App\Filament\Resources\SubClassificationResource\Pages;

use App\Filament\Resources\SubClassificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSubClassification extends ViewRecord
{
    protected static string $resource = SubClassificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
