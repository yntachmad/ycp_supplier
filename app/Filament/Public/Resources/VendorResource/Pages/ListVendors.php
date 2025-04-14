<?php

namespace App\Filament\Public\Resources\VendorResource\Pages;

use Filament\Actions;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Query\Builder;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Pagination\CursorPaginator;
use App\Filament\Public\Resources\VendorResource;

class ListVendors extends ListRecords
{
    protected static string $resource = VendorResource::class;

    // protected ?string $heading = 'Custom Page Heading';

    protected function getHeaderActions(): array
    {
        return [
            // Actions\CreateAction::make(),
        ];
    }

    public function getTitle(): string
    {
        return "";
    }

    // protected function paginateTableQuery(\Illuminate\Database\Eloquent\Builder $query): Paginator
    // {
    //     return $query->simplePaginate(($this->getTableRecordsPerPage() === 'all') ? $query->count() : $this->getTableRecordsPerPage());
    // }

    protected function getTableRecordUrlUsing(): ?\Closure
    {
        return null;
    }

    protected function paginateTableQuery(\Illuminate\Database\Eloquent\Builder $query): CursorPaginator
    {
        return $query->cursorPaginate(($this->getTableRecordsPerPage() === 'all') ? $query->count() : $this->getTableRecordsPerPage());
    }


}
