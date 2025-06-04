<?php

namespace App\Filament\Public\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Vendor;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\CompanyType;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Enums\MaxWidth;
use Filament\Support\Enums\FontWeight;
use Filament\Tables\Actions\ViewAction;
use Illuminate\Database\Eloquent\Model;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Actions\Action;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Public\Resources\VendorResource\Pages;
use App\Filament\Public\Resources\VendorResource\RelationManagers;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?string $navigationLabel = 'Humanitarian Supply Chain';

    // protected static bool $shouldRegisterNavigation = false;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('group_id')
                    ->relationship('group', 'id'),
                Forms\Components\Select::make('category_id')
                    ->relationship('category', 'id'),
                Forms\Components\Select::make('classification_id')
                    ->relationship('classification', 'id'),
                Forms\Components\Select::make('subclassification_id')
                    ->relationship('subclassification', 'id'),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Select::make('type_company_id')
                    ->relationship('typeCompany', 'id'),
                Forms\Components\TextInput::make('supplier_name')
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact_person')
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact_phone')
                    ->tel()
                    ->maxLength(255),
                Forms\Components\TextInput::make('contact_email')
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('website')
                    ->maxLength(255),
                Forms\Components\Textarea::make('address')
                    ->columnSpanFull(),
                Forms\Components\Select::make('province_id')
                    ->relationship('province', 'id'),
                Forms\Components\Select::make('city_id')
                    ->relationship('city', 'id'),
                Forms\Components\TextInput::make('legal_document')
                    ->maxLength(255),
                Forms\Components\TextInput::make('tax_register')
                    ->numeric(),
                Forms\Components\TextInput::make('Terms_condition')
                    ->numeric(),
                Forms\Components\Select::make('bank_id')
                    ->relationship('bank', 'id'),
                Forms\Components\TextInput::make('created_by')
                    ->numeric(),
                Forms\Components\TextInput::make('updated_by')
                    ->numeric(),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->striped()
            // ->recordUrl(
            //     false
            // )

            // ->openRecordUrlInNewTab()
            // ->deferLoading()
            // ->heading('Clients')
            // ->paginated(false)
            ->paginated([50, 100, 200, 500, 'all'])
            // ->defaultPaginationPageOption(2)
            // ->extremePaginationLinks(50)
            ->columns([

                \Filament\Tables\Columns\IconColumn::make('verified')
                    ->label('Verified')
                    ->alignment('center')
                    ->icon(fn(string $state): string => match ($state) {
                        '1' => 'heroicon-o-check-circle',
                        '0' => 'heroicon-o-minus-circle',

                    })
                    ->color(fn(string $state): string => match ($state) {
                        '1' => 'primary',
                        '0' => 'gray',

                        default => 'danger',
                    }),

                Tables\Columns\TextColumn::make('classification.classification_name')
                    ->label('Services')
                    ->size('sm')
                    ->sortable()
                    ->color((fn(Vendor $record): string => $record->verified == 1 ? 'primary' : 'gray'))
                    ->weight(FontWeight::Bold)
                    // ->description(fn(Vendor $record): string => mb_strlen($record->Subclassification['subclassification_name']) > 25 ? substr($record->Subclassification['subclassification_name'], 0, 25) . '..' : $record->Subclassification['subclassification_name'])
                    // ->sortable(),
                    ->description(fn(Vendor $record): string => $record->category['category_name'])
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier_name')
                    ->label('Vendor Name')
                    ->sortable()
                    ->words(3)
                    ->color((fn(Vendor $record): string => $record->trained == 1 ? 'black' : 'gray'))
                    // ->limit(5)
                    ->weight(FontWeight::Bold)
                    ->description(fn(Vendor $record): string => $record->trained != 0 ? 'Trained' : 'Untrained')
                    ->searchable(),
                Tables\Columns\TextColumn::make('province.province')
                    ->description(fn(Vendor $record): string => $record->city['city'])
                    // ->wrap()
                    ->label('Location')
                    // ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Products / Services')
                    ->size('sm')
                    ->wrap()
                    ->words(13)
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->description(fn(Vendor $record): string => $record->contact_phone)
                    ->label('Contact')
                    // ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type_company_id')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->listWithLineBreaks()
                    ->formatStateUsing(function ($state) {
                        if ($state == null || $state == '') {
                            return 'No Category';
                        } else {
                            $data = explode(",", $state);
                            $data1 = [];
                            foreach ($data as $item) {
                                $getItem = CompanyType::where('id', $item)->first();
                                $data1[] = $getItem['companyType'];
                            }
                            $data1 = implode(", ", $data1);

                            // var_dump($data);
                            return $data1;

                        }
                        // var_dump($state);
            
                    })
                    ->label('Category'),
                // ->searchable()
                // ->sortable(),
                // Tables\Columns\TextColumn::make('category.category_name')
                //     ->label('Category')
                //     ->toggleable(isToggledHiddenByDefault: true)
                //     // ->description(fn(Vendor $record): string => $record->contact_phone)
                //     ->searchable()
                //     ->sortable(),
            ])->defaultSort('created_at', 'desc')
            // ->contentGrid([
            //     'md' => 2,
            //     'xl' => 3,
            // ])
            ->searchPlaceholder('Search by Name / Services') // Customize your placeholder here
            // ... other table configurations
            ->filters([

                // Tables\Filters\TrashedFilter::make(),
                // SelectFilter::make('verified')
                //     ->label('Verified Vendor')
                //     ->options([
                //         '1' => 'Verified',
                //         '0' => 'Unverified',
                //     ]),
                // SelectFilter::make('trained')
                //     ->label('Trained Vendor')
                //     ->options([
                //         '1' => 'Trained',
                //         '0' => 'Untrained',
                //     ]),
                // ->preload(),
                // ->relationship(name: 'classification', titleAttribute: 'classification_name'),
                // SelectFilter::make('classification_id')
                //     ->label('Services')
                //     ->multiple()
                //     ->searchable()
                //     ->preload()
                //     ->relationship(name: 'classification', titleAttribute: 'classification_name'),
                // SelectFilter::make('Category_id')
                //     ->label('Category')
                //     ->multiple()
                //     ->searchable()
                //     ->preload()
                //     ->relationship(name: 'category', titleAttribute: 'category_name'),

                SelectFilter::make('type_company_id')
                    ->label('Category of Vendor')
                    // ->multiple()
                    ->searchable()
                    ->preload()
                    ->options(CompanyType::all()->pluck('companyType', 'id'))
                    // ->relationship(name: 'TypeCompany', titleAttribute: 'companyType')
                    ->query(function (Builder $query, array $data): Builder {
                        if (isset($data['value'])) {
                            // Assuming 'theme' is a direct key in the JSON
                            return $query->whereJsonContains('type_company_id', $data['value']);
                        }
                        return $query;
                    }),



                SelectFilter::make('province_id')
                    ->label('Location')
                    // ->multiple()
                    ->searchable()
                    ->preload()
                    // ->live()
                    // ->afterStateUpdated(function (Set $set) {
                    //     $set('city_id', null);
                    // })
                    ->relationship(name: 'province', titleAttribute: 'province'),
                // SelectFilter::make('city_id')
                //     ->label('City')
                //     // ->multiple()
                //     ->searchable()
                //     ->preload()
                //     // ->live()
                //     // ->afterStateUpdated(function (Set $set) {
                //     //     $set('city_id', null);
                //     // })
                //     ->relationship(name: 'city', titleAttribute: 'city'),



            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make('view')
                        ->label('View')
                        ->icon('heroicon-o-eye')
                        ->modalDescription('Vendor Information Details')
                        ->modalHeading('Vendor Card')
                        ->modalWidth(MaxWidth::FourExtraLarge)
                        ->stickyModalHeader()
                        ->modalAutofocus(false)
                        ->modalContent(Infolist::make())
                        ->modalAlignment('center'),

                    // EditAction::make('edit'),
                    // ForceDeleteAction::make('Delete'),

                    // EditAction::make('edit'),
                    // Action::make('delete'),
                ])
                // ->label('Details')
                //     ->icon('heroicon-m-ellipsis-vertical')
                // ->size(ActionSize::Small)
                //     ->color('primary')
                //     ->button(),
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
            ])
            ->headerActions([
                // ExportBulkAction::make()
                //     ->exporter(VendorExporter::class)

            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     // Tables\Actions\DeleteBulkAction::make(),
                //     Tables\Actions\ForceDeleteBulkAction::make(),
                //     // Tables\Actions\RestoreBulkAction::make(),
                //     // \pxlrbt\FilamentExcel\Actions\Tables\ExportAction::make()->exports([
                //     //     \pxlrbt\FilamentExcel\Exports\ExcelExport::make()->withColumns([

                //     //         \pxlrbt\FilamentExcel\Columns\Column::make('created_at'),
                //     //         \pxlrbt\FilamentExcel\Columns\Column::make('deleted_at'),
                //     //     ]),
                //     // ]),

                // ]),
                // Tables\Actions\ExportBulkAction::make()
                //     ->exporter(VendorExporter::class)
                //     ->modalHeading('Export Vendors')
                //     ->columnMapping(false)
                //     ->formats([
                //         ExportFormat::Xlsx,
                //     ]),
                // ExportAction::make()->exports([
                //     ExcelExport::make('table')->fromTable(),
                //     ExcelExport::make('form')->fromForm(),
                // ])
            ]);
    }


    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make()
                    ->compact()
                    // ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        IconEntry::make('verified')
                            ->inlineLabel()
                            ->boolean(),
                        IconEntry::make('trained')
                            ->inlineLabel()
                            ->boolean(),
                        TextEntry::make('classification.classification_name')
                            ->weight(FontWeight::Bold)
                            // ->size(TextEntry\TextEntrySize::ExtraSmall)
                            ->label('Service')
                            ->inlineLabel(),
                        // TextEntry::make('Subclassification.subclassification_name')
                        //     ->label('Sub Service')
                        //     ->weight(FontWeight::Bold)
                        //     ->inlineLabel(),
                        TextEntry::make('category.category_name')->weight(FontWeight::Bold)
                            ->label('Category of Service')->inlineLabel(),
                        // TextEntry::make('group.group_name')->label('Group')->weight(FontWeight::Bold)
                        //     ->inlineLabel(),
                    ])->columns(2),
                \Filament\Infolists\Components\Section::make('Vendor Profile')
                    // ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        TextEntry::make('supplier_name')
                            ->copyable()
                            ->copyMessage('Copied!')
                            ->label('Vendor Name')
                            // ->inlineLabel()
                            ->weight(FontWeight::Bold),

                        TextEntry::make('type_company_id')->label('Category of Vendor')
                            ->copyable()
                            ->copyMessage('Copied!')
                            ->weight(FontWeight::Bold)
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
                            })
                            // ->inlineLabel()
                            ->listWithLineBreaks(),
                        // ->bulleted()

                        TextEntry::make('description')
                            ->copyable()
                            ->copyMessage('Copied!')
                            ->label('Description : Products / Services')
                            ->html()
                            ->weight(FontWeight::Bold)
                            ->columnSpanFull(),

                        \Filament\Infolists\Components\Group::make()->schema([
                            TextEntry::make('contact_person')
                                ->copyable()
                                ->copyMessage('Copied!')
                                ->weight(FontWeight::Bold),
                            TextEntry::make('contact_phone')
                                ->copyable()
                                ->copyMessage('Copied!')
                                ->weight(FontWeight::Bold),
                            TextEntry::make('contact_email')
                                ->copyable()
                                ->copyMessage('Copied!')
                                // ->wrap()
                                ->weight(FontWeight::Bold),
                        ])->columns(3)->columnSpanFull(),
                        TextEntry::make('address')
                            ->copyable()
                            ->copyMessage('Copied!')
                            ->weight(FontWeight::Bold)
                            ->label('Address')
                            ->columnSpanFull(),
                        \Filament\Infolists\Components\Group::make()->schema([
                            TextEntry::make('province.province')
                                ->weight(FontWeight::Bold),
                            TextEntry::make('city.city')
                                ->weight(FontWeight::Bold),
                            TextEntry::make('website')
                                ->copyable()
                                ->copyMessage('Copied!')
                                ->weight(FontWeight::Bold),
                        ])->columns(3)->columnSpanFull(),
                    ])->columns(2),
                \Filament\Infolists\Components\Section::make('Other Information')
                    // ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        \Filament\Infolists\Components\Group::make()->schema([
                            TextEntry::make('legal_document')
                                // ->size(50)
                                ->weight(FontWeight::Bold)
                                ->listWithLineBreaks()
                                ->bulleted(),
                            TextEntry::make('location_document')
                                ->url(fn(Vendor $record): string => $record->location_document == null ? '#' : $record->location_document)
                                ->formatStateUsing(fn(string $state): string => 'Show Documents')
                                ->openUrlInNewTab()
                                ->color('primary')
                                ->hiddenLabel()
                                ->weight(FontWeight::Bold)
                        ]),


                        TextEntry::make('bank.bank_type')->weight(FontWeight::Bold),

                        \Filament\Infolists\Components\Group::make()->schema([
                            IconEntry::make('tax_register')
                                // ->inlineLabel()
                                ->boolean(),

                            IconEntry::make('Terms_condition')
                                // ->inlineLabel()
                                ->boolean(),

                        ])

                    ])->columns(3),

            ]);
    }






    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVendors::route('/'),
            // 'create' => Pages\CreateVendor::route('/create'),
            // 'view' => Pages\ViewVendor::route('/{record}'),
            // 'edit' => Pages\EditVendor::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return false;
    }
}
