<?php
namespace App\Filament\Pages;

class Dashboard extends \Filament\Pages\Dashboard
{
    // ...
    protected static ?string $title = '';
    // protected static ?string $NavigationLabel = 'Humanitarian';




    public static function getNavigationLabel(): string
    {
        // return static::$navigationLabel ??
        //     static::$title ??
        //     __('filament-panels::pages/dashboard.title');

        return 'Dashboard';
    }

    public function getColumns(): int|string|array
    {
        return 2;
    }


    // protected int|string|array $columnSpan = [
    //     'md' => 2,
    //     'xl' => 2,
    // ];

    // public function getColumns(): int|string|array
    // {
    //     return 2;
    // }


}
