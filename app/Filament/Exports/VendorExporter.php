<?php

namespace App\Filament\Exports;

use App\Models\Vendor;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;

class VendorExporter extends Exporter
{
    protected static ?string $model = Vendor::class;

    public static function getColumns(): array
    {
        return [
            // ExportColumn::make('id')->label('ID'),
            ExportColumn::make('group.group_name')->label('Group'),
            ExportColumn::make('category.category_name')->label('Category'),
            ExportColumn::make('classification.classification_name')->label('Classification'),
            ExportColumn::make('subclassification_id'),
            // ExportColumn::make('description'),
            // ExportColumn::make('typeCompany.id'),
            // ExportColumn::make('supplier_name'),
            // ExportColumn::make('contact_person'),
            // ExportColumn::make('contact_phone'),
            // ExportColumn::make('contact_email'),
            // ExportColumn::make('website'),
            // ExportColumn::make('address'),
            // ExportColumn::make('province.id'),
            // ExportColumn::make('city.id'),
            // ExportColumn::make('legal_document'),
            // ExportColumn::make('tax_register'),
            // ExportColumn::make('Terms_condition'),
            // ExportColumn::make('bank.id'),
            // ExportColumn::make('deleted_at'),
            // ExportColumn::make('created_by'),
            // ExportColumn::make('updated_by'),
            // ExportColumn::make('created_at'),
            // ExportColumn::make('updated_at'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Your vendor export has completed and ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' exported.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to export.';
        }

        return $body;
    }
}
