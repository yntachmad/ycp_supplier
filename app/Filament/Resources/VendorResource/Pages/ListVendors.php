<?php

namespace App\Filament\Resources\VendorResource\Pages;

use Filament\Actions;
use App\Models\Vendor;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\VendorResource;
use Illuminate\Pagination\CursorPaginator;
use Filament\Resources\Pages\ListRecords\Tab;

class ListVendors extends ListRecords
{
    protected static string $resource = VendorResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    // public function getTabs(): array
    // {
    //     return [
    //         'All' => Tab::make(),
    //         'Works' => Tab::make()->modifyQueryUsing(fn(Builder $query) => $query->where('category_id', 1)),
    //         'Goods' => Tab::make()->modifyQueryUsing(fn(Builder $query) => $query->where('category_id', 2)),
    //         'Services' => Tab::make()->modifyQueryUsing(fn(Builder $query) => $query->where('category_id', 3))
    //     ];
    // }



    // protected function paginateTableQuery(Builder $query): CursorPaginator
    // {
    //     return $query->cursorPaginate(($this->getTableRecordsPerPage() === 'all') ? $query->count() : $this->getTableRecordsPerPage());
    // }
}
