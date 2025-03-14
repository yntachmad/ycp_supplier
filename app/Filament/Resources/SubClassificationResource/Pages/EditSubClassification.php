<?php

namespace App\Filament\Resources\SubClassificationResource\Pages;

use App\Filament\Resources\SubClassificationResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSubClassification extends EditRecord
{
    protected static string $resource = SubClassificationResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
