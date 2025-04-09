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

            ExportColumn::make('classification.classification_name')->label('Services'),
            ExportColumn::make('Subclassification.subclassification_name')->label('Sub Services'),
            ExportColumn::make('category.category_name')->label('Category'),
            ExportColumn::make('group.group_name')->label('Group'),
            ExportColumn::make('supplier_name')->label('Vendors Name'),
            ExportColumn::make('TypeCompany.companyType')->label('Type of Company'),
            ExportColumn::make('description')->label('Description / Products'),            //
            ExportColumn::make('contact_person')->label('PIC'),
            ExportColumn::make('contact_phone')->label('Phone'),
            ExportColumn::make('contact_email')->label('Email'),
            ExportColumn::make('website')->label('Website'),
            ExportColumn::make('address')->label('Address'),
            ExportColumn::make('province.province')->label('Province'),
            ExportColumn::make('city.city')->label('City'),
            ExportColumn::make('legal_document'),
            ExportColumn::make('bank.bank_type')->label('Bank of Account Bank'),
            ExportColumn::make('tax_register')
                ->formatStateUsing(fn(string $state): string => __("statuses.{$state}")),
            ExportColumn::make('Terms_condition'),
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
