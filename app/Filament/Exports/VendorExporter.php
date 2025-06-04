<?php

namespace App\Filament\Exports;

use App\Models\Vendor;
use App\Models\CompanyType;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Models\Export;

class VendorExporter extends Exporter
{
    protected static ?string $model = Vendor::class;

    public static function getColumns(): array
    {
        return [
            // ExportColumn::make('id')->label('ID'),

            ExportColumn::make('verified')->label('Verified')
                ->formatStateUsing(
                    fn(string $state): string =>
                    $state === '1' ? 'Yes' : 'No'
                ),
            ExportColumn::make('trained')->label('Trained')
                ->formatStateUsing(
                    fn(string $state): string =>
                    $state === '1' ? 'Yes' : 'No'
                ),
            ExportColumn::make('classification.classification_name')->label('Services'),
            // ExportColumn::make('Subclassification.subclassification_name')->label('Sub Services'),
            ExportColumn::make('category.category_name')->label('Category of Service'),
            // ExportColumn::make('group.group_name')->label('Group'),
            ExportColumn::make('supplier_name')->label('Vendors Name'),
            ExportColumn::make('type_company_id')
                ->label('Category of Vendor')
                ->formatStateUsing(function ($state) {
                    // var_dump($state);
                    $data = explode(",", $state);
                    $data1 = [];
                    foreach ($data as $item) {
                        $getItem = CompanyType::where('id', $item)->first();

                        $data1[] = $getItem['companyType'];

                    }
                    $data1 = implode(", ", $data1);

                    // var_dump($data);
                    return $data1;
                }),
            ExportColumn::make('description')->label('Products /Services'),            //
            ExportColumn::make('contact_person')->label('Contact Person'),
            ExportColumn::make('contact_phone')->label('Phone'),
            ExportColumn::make('contact_email')->label('Email'),
            ExportColumn::make('website')->label('Website'),
            ExportColumn::make('address')->label('Address'),
            ExportColumn::make('province.province')->label('Province'),
            ExportColumn::make('city.city')->label('City'),
            ExportColumn::make('legal_document'),
            ExportColumn::make('bank.bank_type')->label('Bank of Account Bank'),
            ExportColumn::make('tax_register')
                ->formatStateUsing(
                    fn(string $state): string =>
                    $state === '1' ? 'Yes' : 'No'
                ),

            ExportColumn::make('Terms_condition')
                ->formatStateUsing(
                    fn(string $state): string =>
                    $state === '1' ? 'Yes' : 'No'
                ),
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
