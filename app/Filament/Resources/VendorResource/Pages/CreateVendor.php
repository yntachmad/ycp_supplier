<?php

namespace App\Filament\Resources\VendorResource\Pages;

use Filament\Actions;
use Filament\Support\Enums\MaxWidth;
use App\Filament\Resources\VendorResource;
use Filament\Resources\Pages\CreateRecord;

class CreateVendor extends CreateRecord
{
    protected static string $resource = VendorResource::class;

    // protected static ?string $title = 'Register New Vendor';

    protected function getRedirectUrl(): string
    {
        return static::getResource()::getUrl('index');
    }

    public function getMaxContentWidth(): MaxWidth
    {
        return MaxWidth::SixExtraLarge; // Or any other MaxWidth enum value
    }


}
