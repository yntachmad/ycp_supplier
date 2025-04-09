<?php

namespace App\Filament\Public\Resources\VendorResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use App\Filament\Public\Resources\VendorResource;
use Filament\Infolists\Components\Actions\Action;

class ViewVendor extends ViewRecord
{
    protected static string $resource = VendorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // Actions\EditAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return "dsfdsf";
    }

    public function getHeading(): string
    {
        return "dsfsdf";
    }

    // public function onboardingAction(): Action
    // {
    //     return Action::make('onboarding')
    //         ->modalHeading('Welcome');
    //     // ->visible(fn(): bool => !auth()->user()->isOnBoarded());
    // }
}
