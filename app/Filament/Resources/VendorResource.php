<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Bank;
use App\Models\City;
use Filament\Tables;
use App\Models\Vendor;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;

use App\Models\Classification;

use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use App\Models\SubClassification;


use Illuminate\Support\Collection;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Radio;
// use Filament\Forms\Components\Section;
use Filament\Support\Enums\MaxWidth;
use Filament\Forms\Components\Toggle;
use Filament\Support\Enums\ActionSize;
use Filament\Support\Enums\FontWeight;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use App\Filament\Exports\VendorExporter;
use Filament\Forms\Components\TextInput;
use Filament\Infolists\Components\Split;
use Filament\Tables\Actions\ActionGroup;

use App\Filament\Exports\VendorsExporter;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Section;
use Filament\Forms\Components\CheckboxList;
use Filament\Infolists\Components\Fieldset;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Actions\ExportBulkAction;
use pxlrbt\FilamentExcel\Exports\ExcelExport;
use App\Filament\Resources\VendorResource\Pages;
use Filament\Actions\Exports\Enums\ExportFormat;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use App\Filament\Resources\VendorResource\RelationManagers;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $modelLabel = 'Vendors';

    protected static ?string $label = "test title";

    protected static ?string $pluralLabel = 'Vendors';

    // protected static ?string $recordTitleAttribute = 'Test';


    // protected static bool $shouldRegisterNavigation = false;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    // protected static ?string $navigationParentItem = 'Notifications';



    protected static ?string $navigationBadgeTooltip = 'The number of Vendors';

    public static function getTitle(): string
    {
        return 'Supplier Information';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Forms\Components\Card::make()
                    // ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([

                        // Forms\Components\Toggle::make('verified')
                        //     ->label('is Verified Vendor ?')
                        //     ->inlineLabel()
                        //     ->required(),
                        Forms\Components\Checkbox::make('verified')
                            ->label('is Verified Vendor ?')
                            ->afterStateUpdated(function (Set $set) {
                                $set('trained', null);
                            })
                            ->live(),
                        Forms\Components\Checkbox::make('trained')
                            ->label('is Trained Vendor ?')
                            ->live(),
                        // \Filament\Forms\Components\Select::make('verified')->label('Verified Vendor')
                        //     ->inlineLabel()
                        //     ->options([
                        //         'yes' => 'Yes',
                        //         'no' => 'No',
                        //         // 'published' => 'Published',
                        //     ]),
                        // \Filament\Forms\Components\Select::make('trained')->label('Trained Vendor')
                        //     ->inlineLabel()
                        //     ->options([
                        //         'yes' => 'Yes',
                        //         'no' => 'No',
                        //         // 'published' => 'Published',
                        //     ]),
                        // Checkbox::make('verified')->label('is Verified Vendor ?'),
                        // Forms\Components\TextInput::make('tax_register')
                        //     ->required(),
                        // \Filament\Forms\Components\Toggle::make('Terms_condition'),
                        // Checkbox::make('trained'),
                        Forms\Components\Select::make('classification_id')
                            ->relationship(name: 'classification', titleAttribute: 'classification_name')
                            ->afterStateUpdated(function (Set $set) {
                                $set('subClassification_id', null);
                            })
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->inlineLabel()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('classification_name')
                                    ->label('Service Name')
                                    ->required(),

                            ])
                            // ->extraAttributes([
                            //     'class' => 'block w-full p-1 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500',

                            // ])
                            ->label('Services'),

                        Forms\Components\Select::make('subclassification_id')
                            // ->relationship(name: 'subClassification', titleAttribute: 'subclassification_name')
                            ->options(fn(Get $get): Collection => SubClassification::query()->where('classification_id', $get('classification_id'))->pluck('subclassification_name', 'id'))
                            ->createOptionForm([
                                Forms\Components\Select::make('classification_id')
                                    // ->relationship(name: 'classification', titleAttribute: 'classification_name')
                                    ->options(Classification::all()->pluck('classification_name', 'id'))
                                    ->label('Services Name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Forms\Components\TextInput::make('subclassification_name')
                                    ->label('Sub Services Name')
                                    ->required(),
                            ])
                            ->searchable()
                            ->preload()
                            ->inlineLabel()
                            ->live()
                            // ->required()
                            ->label('Sub Services'),
                        Forms\Components\Select::make('category_id')
                            ->relationship(name: 'Category', titleAttribute: 'category_name')
                            ->searchable()
                            ->preload()
                            ->inlineLabel()
                            ->required()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('category_name')
                                    ->required(),
                                Forms\Components\Textarea::make('category_description')
                                    ->required(),

                            ])
                            ->label('Category'),
                        Forms\Components\Select::make('group_id')
                            ->relationship(name: 'group', titleAttribute: 'group_name')
                            ->searchable()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('group_name')
                                    ->required(),
                                Forms\Components\Textarea::make('group_description')
                                    ->required(),

                            ])
                            ->preload()
                            ->inlineLabel()
                            ->required()
                            ->label('Group'),

                    ])->columns(2),
                Forms\Components\Card::make('Vendor Profile')
                    // ->description('Add Information details')
                    ->schema([
                        Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\TextInput::make('supplier_name')
                                    ->label('Vendor Name')
                                    ->required()
                                    ->maxLength(255),
                                \Filament\Forms\Components\Select::make('type_company_id')
                                    ->relationship(name: 'TypeCompany', titleAttribute: 'companyType')
                                    ->searchable()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('companyType')
                                            ->required(),
                                        Forms\Components\TextInput::make('information')
                                            ->required(),

                                    ])
                                    ->preload()
                                    ->required()
                                    ->label('Type of Company'),
                            ])->columns(2)->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->label('Description / Product ')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('contact_person')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_phone')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('contact_email')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('address')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\Select::make('province_id')
                            ->relationship(name: 'province', titleAttribute: 'province')
                            ->afterStateUpdated(function (Set $set) {
                                $set('city_id', null);
                            })
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->label('Province'),

                        Forms\Components\Select::make('city_id')
                            // ->relationship(name: 'subClassification', titleAttribute: 'subclassification_name')
                            ->options(fn(Get $get): Collection => City::query()->where('province_id', $get('province_id'))->pluck('city', 'id'))
                            ->searchable()
                            ->preload()
                            ->live()
                            ->required()
                            ->label('City'),

                        Forms\Components\TextInput::make('website')
                            ->maxLength(255),
                        // ->bulkToggleable(),



                    ])->columns(3),
                \Filament\Forms\Components\Card::make('Other Information')
                    // ->description('Add Information details')
                    ->schema([
                        Forms\Components\Group::make()
                            ->schema([
                                Checkbox::make('tax_register')->label('is Tax Register ?'),
                                // Forms\Components\TextInput::make('tax_register')
                                //     ->required(),
                                // \Filament\Forms\Components\Toggle::make('Terms_condition'),
                                Checkbox::make('Terms_condition'),
                            ])->columns(1),
                        Forms\Components\CheckboxList::make('legal_document')
                            ->label('Legal Documents')
                            ->options([
                                'ID Card' => 'ID Card',
                                'SIUP/NIB' => 'SIUP/NIB',
                                'NPWP' => 'NPWP',
                                'Financial Audited Statement' => 'Financial Audited Statement',
                                'Domicilie' => 'Domicilie',
                                'Akta Pendirian' => 'Akta Pendirian',
                                'Akta Notaris' => 'Akta Notaris',
                                'Bank Account' => 'Bank Account',
                            ])->columns(2),
                        Forms\Components\Radio::make('bank_id')
                            ->options(fn(): Collection => Bank::query()->pluck('bank_type', 'id'))->label('Type of Account Bank'),

                    ])->columns(3),
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
                    ->description(fn(Vendor $record): string => mb_strlen($record->Subclassification['subclassification_name']) > 25 ? substr($record->Subclassification['subclassification_name'], 0, 25) . '..' : $record->Subclassification['subclassification_name'])
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier_name')
                    ->label('Vendor Name')
                    ->sortable()
                    ->words(3)
                    ->color((fn(Vendor $record): string => $record->trained == 1 ? 'black' : 'gray'))
                    // ->limit(5)
                    ->weight(FontWeight::Bold)
                    ->description(fn(Vendor $record): string => $record->trained != 0 ? $record->category['category_name'] . ' - ' . 'Trained' : $record->category['category_name'] . ' - ' . 'Untrained')
                    ->searchable(),
                Tables\Columns\TextColumn::make('province.province')
                    ->description(fn(Vendor $record): string => $record->city['city'])
                    // ->wrap()
                    ->label('Location')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description / Products')
                    ->size('sm')
                    ->wrap()
                    ->words(13)
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->description(fn(Vendor $record): string => $record->contact_phone)
                    ->label('Contact')
                    ->searchable()
                    ->sortable(),
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
            ->filters([

                // Tables\Filters\TrashedFilter::make(),
                SelectFilter::make('verified')
                    ->label('Verified Vendor')
                    ->options([
                        '1' => 'Verified',
                        '0' => 'Unverified',
                    ]),
                SelectFilter::make('trained')
                    ->label('Trained Vendor')
                    ->options([
                        '1' => 'Trained',
                        '0' => 'Untrained',
                    ]),
                // ->preload(),
                // ->relationship(name: 'classification', titleAttribute: 'classification_name'),
                SelectFilter::make('classification_id')
                    ->label('Services')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship(name: 'classification', titleAttribute: 'classification_name'),
                SelectFilter::make('Category_id')
                    ->label('Category')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship(name: 'category', titleAttribute: 'category_name'),

                SelectFilter::make('type_company_id')
                    ->label('Type of Company')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship(name: 'TypeCompany', titleAttribute: 'companyType'),



                SelectFilter::make('province_id')
                    ->label('Provinces')
                    // ->multiple()
                    ->searchable()
                    ->preload()
                    // ->live()
                    // ->afterStateUpdated(function (Set $set) {
                    //     $set('city_id', null);
                    // })
                    ->relationship(name: 'province', titleAttribute: 'province'),
                SelectFilter::make('city_id')
                    ->label('City')
                    // ->multiple()
                    ->searchable()
                    ->preload()
                    // ->live()
                    // ->afterStateUpdated(function (Set $set) {
                    //     $set('city_id', null);
                    // })
                    ->relationship(name: 'city', titleAttribute: 'city'),



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

                    EditAction::make('edit'),
                    \Filament\Tables\Actions\DeleteAction::make('Delete'),

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
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    // \pxlrbt\FilamentExcel\Actions\Tables\ExportAction::make()->exports([
                    //     \pxlrbt\FilamentExcel\Exports\ExcelExport::make()->withColumns([

                    //         \pxlrbt\FilamentExcel\Columns\Column::make('created_at'),
                    //         \pxlrbt\FilamentExcel\Columns\Column::make('deleted_at'),
                    //     ]),
                    // ]),

                ]),
                Tables\Actions\ExportBulkAction::make()
                    ->exporter(VendorExporter::class)
                    ->modalHeading('Export Vendors')
                    ->columnMapping(false)
                    ->formats([
                        ExportFormat::Xlsx,
                    ]),
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
                        TextEntry::make('Subclassification.subclassification_name')
                            ->label('Sub Service')
                            ->weight(FontWeight::Bold)
                            ->inlineLabel(),
                        TextEntry::make('category.category_name')->weight(FontWeight::Bold)
                            ->label('Category')->inlineLabel(),
                        TextEntry::make('group.group_name')->label('Group')->weight(FontWeight::Bold)
                            ->inlineLabel(),
                    ])->columns(2),
                \Filament\Infolists\Components\Section::make('Vendor Profile')
                    // ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        TextEntry::make('supplier_name')
                            ->copyable()
                            ->copyMessage('Copied!')
                            ->label('Vendor Name')
                            ->weight(FontWeight::Bold)
                            ->inlineLabel(),
                        TextEntry::make('typeCompany.companyType')->label('Type of Vendor')
                            ->copyable()
                            ->copyMessage('Copied!')
                            ->weight(FontWeight::Bold)
                            ->inlineLabel(),
                        TextEntry::make('description')
                            ->copyable()
                            ->copyMessage('Copied!')
                            ->label('Description / Product ')
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
                        TextEntry::make('legal_document')
                            // ->size(50)
                            ->weight(FontWeight::Bold)
                            ->listWithLineBreaks()
                            ->bulleted(),
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
            'create' => Pages\CreateVendor::route('/create'),
            // 'view' => Pages\ViewVendor::route('/{record}'),
            // 'edit' => Pages\EditVendor::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
