<?php

namespace App\Filament\Resources\ClassificationResource\Pages;

use App\Filament\Resources\ClassificationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewClassification extends ViewRecord
{
    protected static string $resource = ClassificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return "Editing " . $this->record->name; // Assuming $this->record contains the resource data
    }
}
