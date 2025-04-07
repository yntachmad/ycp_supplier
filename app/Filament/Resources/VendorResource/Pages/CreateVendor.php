<?php

namespace App\Filament\Resources\VendorResource\Pages;

use App\Filament\Resources\VendorResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateVendor extends CreateRecord
{
    protected static string $resource = VendorResource::class;

    // protected static ?string $title = 'Register New Vendor';

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }


}
