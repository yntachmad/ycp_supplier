<?php

namespace App\Filament\Widgets;

use App\Models\Vendor;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class VendorAdminOverview extends BaseWidget
{

    protected static bool $isLazy = false;
    protected function getStats(): array
    {
        return [

            Stat::make('Vendors', Vendor::query()->count())
                ->icon('heroicon-o-users')
                ->url('/admin/vendors')
                ->color('primary')
                ->description('Total of Vendors'),
            // ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Works', Vendor::query()->where('category_id', 1)->count())
                ->icon('heroicon-o-users')
                ->description('Works Category')
                ->url('/admin/vendors?tableFilters[Category_id][values][0]=1')
                ->color('primary'),
            // ->extraAttributes([
            //             'class' => 'cursor-pointer',
            //             // 'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
            //             'wire:click' => "goto()",
            //         ]),
            // ->descriptionIcon('heroicon-m-arrow-trending-down'),
            Stat::make('Goods', Vendor::query()->where('category_id', 2)->count())
                ->icon('heroicon-o-users')
                ->url('admin/vendors?tableFilters[Category_id][values][0]=2')
                ->color('primary')
                ->description('Goods Category'),
            // ->descriptionIcon('heroicon-m-arrow-trending-up'),
            Stat::make('Services', Vendor::query()->where('category_id', 3)->count())
                ->icon('heroicon-o-users')
                ->url('admin/vendors?tableFilters[Category_id][values][0]=3')
                ->color('primary')
                ->description('Services Category'),
            Stat::make('verified', Vendor::query()->where('verified', 1)->count())
                ->label('Verified')
                ->icon('heroicon-o-users')
                ->url('admin/vendors?tableFilters[Category_id][values][0]=3')
                ->color('primary')
                ->description('Verified Vendors'),
            Stat::make('verified', Vendor::query()->where('verified', 0)->count())
                ->label('Unverified')
                ->icon('heroicon-o-users')
                ->url('admin/vendors?tableFilters[Category_id][values][0]=3')
                ->color('primary')
                ->description('Unverified Vendors')
            // ->descriptionIcon('heroicon-m-arrow-trending-up', IconPosition::After),
            // Stat::make('Average time on page', '3:12')
            //     ->description('3% increase')
            //     ->descriptionIcon('heroicon-m-arrow-trending-up')
            //     ->color('success'),
            // Stat::make('Processed', '192.1k')
            //     ->color('success')
            //     ->extraAttributes([
            //         'class' => 'cursor-pointer',
            //         'wire:click' => "\$dispatch('setStatusFilter', { filter: 'processed' })",
            //     ]),
            // Stat::make('Unique views', '192.1k')
            //     ->description('32k increase')
            //     ->descriptionIcon('heroicon-m-arrow-trending-up')
            //     ->chart([7, 2, 10, 3, 15, 4, 17])
            //     ->color('success'),
        ];
    }

    protected function getHeading(): ?string
    {
        return 'Yayasan CARE Peduli';
    }

    protected function getDescription(): ?string
    {
        return 'Humanitarian Supply Chain';
    }

    public function goto()
    {
        return redirect()->to('/admin/vendors');
    }
}
