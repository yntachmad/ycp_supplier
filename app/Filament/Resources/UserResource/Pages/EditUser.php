<?php

namespace App\Filament\Resources\UserResource\Pages;

use App\Filament\Resources\UserResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Hash;

class EditUser extends EditRecord
{
    protected static string $resource = UserResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }

    public function mutateFormDataBeforeSave(array $data): array
    {
        if (array_key_exists('new_password', $data) || filled($data['new_password'])) {
            $this->record->password = Hash::make($data['new_password']);
            unset($data['new_password']);
        }
        return $data;
    }
}
