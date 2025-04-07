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
use Filament\Tables\Columns\ToggleColumn;

use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use Filament\Infolists\Components\Fieldset;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Actions\ExportBulkAction;
use App\Filament\Resources\VendorResource\Pages;
use Filament\Actions\Exports\Enums\ExportFormat;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use Illuminate\Database\Eloquent\SoftDeletingScope;
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
                \Filament\Forms\Components\Card::make()
                    // ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        \Filament\Forms\Components\Select::make('classification_id')
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

                        \Filament\Forms\Components\Select::make('subclassification_id')
                            // ->relationship(name: 'subClassification', titleAttribute: 'subclassification_name')
                            ->options(fn(Get $get): Collection => SubClassification::query()->where('classification_id', $get('classification_id'))->pluck('subclassification_name', 'id'))
                            ->createOptionForm([
                                \Filament\Forms\Components\Select::make('classification_id')
                                    // ->relationship(name: 'classification', titleAttribute: 'classification_name')
                                    ->options(Classification::all()->pluck('classification_name', 'id'))
                                    ->label('Services Name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),
                                Forms\Components\TextInput::make('subclassification_name')
                                    ->label('Sub Service Name')
                                    ->required(),
                            ])
                            ->searchable()
                            ->preload()
                            ->inlineLabel()
                            ->live()
                            // ->required()
                            ->label('Sub Services'),
                        \Filament\Forms\Components\Select::make('category_id')
                            ->relationship(name: 'Category', titleAttribute: 'category_name')
                            ->searchable()
                            ->preload()
                            ->inlineLabel()
                            ->required()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('category_name')
                                    ->required(),

                            ])
                            ->label('Category'),
                        \Filament\Forms\Components\Select::make('group_id')
                            ->relationship(name: 'group', titleAttribute: 'group_name')
                            ->searchable()
                            ->createOptionForm([
                                Forms\Components\TextInput::make('group_name')
                                    ->required(),

                            ])
                            ->preload()
                            ->inlineLabel()
                            ->required()
                            ->label('Group'),

                    ])->columns(2),
                \Filament\Forms\Components\Card::make('Vendor Profile')
                    // ->description('Add Information details')
                    ->schema([
                        \Filament\Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\TextInput::make('supplier_name')
                                    ->label('Vendor Name')
                                    ->required()
                                    ->maxLength(255),
                                \Filament\Forms\Components\Select::make('type_company_id')
                                    ->relationship(name: 'TypeCompany', titleAttribute: 'companyType')
                                    ->searchable()
                                    ->createOptionForm([
                                        Forms\Components\TextInput::make('name')
                                            ->required(),
                                        Forms\Components\TextInput::make('email')
                                            ->required()
                                            ->email(),
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
                        \Filament\Forms\Components\Select::make('province_id')
                            ->relationship(name: 'province', titleAttribute: 'province')
                            ->afterStateUpdated(function (Set $set) {
                                $set('city_id', null);
                            })
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live()
                            ->label('Province'),

                        \Filament\Forms\Components\Select::make('city_id')
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
                        \Filament\Forms\Components\Group::make()
                            ->schema([
                                Checkbox::make('tax_register')->label('is Tax Register ?'),
                                // Forms\Components\TextInput::make('tax_register')
                                //     ->required(),
                                // \Filament\Forms\Components\Toggle::make('Terms_condition'),
                                Checkbox::make('Terms_condition'),
                            ])->columns(1),
                        \Filament\Forms\Components\CheckboxList::make('legal_document')
                            ->label('Legal Documents')
                            ->options([
                                'ID Card' => 'ID Card',
                                'SIUP' => 'SIUP',
                                'NPWP' => 'NPWP',
                                'Financial Audited Statement' => 'Financial Audited Statement',
                                'Domicilie' => 'Domicilie',
                                'Akta Pendirian' => 'Akta Pendirian',
                                'Akta Notaris' => 'Akta Notaris',
                                'Bank Account' => 'Bank Account',
                            ])->columns(2),
                        \Filament\Forms\Components\Radio::make('bank_id')
                            ->options(fn(): Collection => Bank::query()->pluck('bank_type', 'id'))->label('Type of Account Bank'),

                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->striped()
            // ->openRecordUrlInNewTab()
            // ->deferLoading()
            // ->heading('Clients')
            // ->paginated(false)
            // ->paginated([5, 25, 50, 100, 200, 500, 'all'])
            // ->defaultPaginationPageOption(2)
            // ->extremePaginationLinks(5)
            ->columns([
                Tables\Columns\TextColumn::make('classification.classification_name')
                    ->label('Services')
                    ->searchable()
                    ->weight(FontWeight::Bold)
                    ->color('primary')
                    ->description(fn(Vendor $record): string => $record->Subclassification['subclassification_name'])
                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier_name')
                    ->label('Vendor Name')
                    // ->wrap()
                    ->words(3)
                    ->weight(FontWeight::Bold)
                    ->description(fn(Vendor $record): string => $record->category_id != null ? $record->category['category_name'] : '-')
                    ->searchable(),
                Tables\Columns\TextColumn::make('province.province')
                    ->description(fn(Vendor $record): string => $record->city['city'])
                    ->label('Location')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->label('Description / Products')
                    ->wrap()
                    ->words(13)
                    ->searchable(),
                Tables\Columns\TextColumn::make('group.group_name')
                    ->hidden(),
                Tables\Columns\TextColumn::make('typeCompany.companyType')
                    ->hidden()
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('category.category_name')
                    ->hidden()
                    ->sortable(),
                Tables\Columns\TextColumn::make('Subclassification.subclassification_name')
                    ->hidden()
                    ->sortable(),
                Tables\Columns\TextColumn::make('contact_person')
                    ->hidden()
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_phone')
                    ->hidden()
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_email')
                    ->hidden()
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->hidden()
                    ->searchable(),
                // Tables\Columns\TextColumn::make('province.province')
                //     ->sortable(),
                Tables\Columns\TextColumn::make('city.city')
                    ->searchable()
                    ->hidden()
                    ->sortable(),

                Tables\Columns\TextColumn::make('legal_document')
                    ->hidden()
                    ->searchable(),
                ToggleColumn::make('tax_register')->hidden(),
                ToggleColumn::make('Terms_condition')->hidden(),
                // Tables\Columns\TextColumn::make('tax_register'),
                // Tables\Columns\TextColumn::make('Terms_condition'),


                Tables\Columns\TextColumn::make('bank.bank_type')->hidden(),

                Tables\Columns\TextColumn::make('typeCompany.companyType')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Type of Company')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('contact_person')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->description(fn(Vendor $record): string => $record->contact_phone)
                    ->label('Contact')
                    ->searchable()
                    ->sortable(),


                // Tables\Columns\TextColumn::make('category.category_name')
                //     // ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('created_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
                // Tables\Columns\TextColumn::make('updated_at')
                //     ->dateTime()
                //     ->sortable()
                //     ->toggleable(isToggledHiddenByDefault: true),
            ])
            // ->contentGrid([
            //     'md' => 2,
            //     'xl' => 3,
            // ])
            ->filters([

                // Tables\Filters\TrashedFilter::make(),
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

                // SelectFilter::make('city_id')
                //     ->label('city')
                //     ->options(fn(Get $get): Collection => City::query()->where('province_id', $get('province_id'))->pluck('city', 'id'))
                //     ->multiple()
                //     // ->live()
                //     ->searchable()
                //     ->preload(),
                // // ->relationship(name: 'city', titleAttribute: 'city'),

            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make('view'),
                    EditAction::make('edit'),
                    // EditAction::make('edit'),
                    // Action::make('delete'),
                ])
                    // ->label('Details')
                    //     ->icon('heroicon-m-ellipsis-vertical')
                    ->size(ActionSize::Small)
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

                ]),
                ExportBulkAction::make()
                    ->exporter(VendorExporter::class)
                    ->formats([
                        ExportFormat::Xlsx,
                    ])
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make()
                    // ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('classification.classification_name')
                            ->label('Service')
                            ->inlineLabel(),
                        \Filament\Infolists\Components\TextEntry::make('Subclassification.subclassification_name')->label('Sub Service')->inlineLabel(),
                        \Filament\Infolists\Components\TextEntry::make('category.category_name')->label('Category')->inlineLabel(),
                        \Filament\Infolists\Components\TextEntry::make('group.group_name')->label('Group')->inlineLabel(),
                    ])->columns(2),
                \Filament\Infolists\Components\Section::make('Vendor Profile')
                    // ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('supplier_name')->label('Vendor Name')
                            ->inlineLabel(),
                        \Filament\Infolists\Components\TextEntry::make('typeCompany.companyType')->label('Type of Company')
                            ->inlineLabel(),
                        \Filament\Infolists\Components\TextEntry::make('description')->label('Description / Product ')->columnSpanFull(),

                        \Filament\Infolists\Components\Group::make()->schema([
                            \Filament\Infolists\Components\TextEntry::make('contact_person'),
                            \Filament\Infolists\Components\TextEntry::make('contact_phone'),
                            \Filament\Infolists\Components\TextEntry::make('contact_email'),
                        ])->columns(3)->columnSpanFull(),
                        \Filament\Infolists\Components\TextEntry::make('address')->label('Address')->columnSpanFull(),
                        \Filament\Infolists\Components\Group::make()->schema([
                            \Filament\Infolists\Components\TextEntry::make('province.province'),
                            \Filament\Infolists\Components\TextEntry::make('city.city'),
                            \Filament\Infolists\Components\TextEntry::make('website'),
                        ])->columns(3)->columnSpanFull(),



                    ])->columns(2),
                \Filament\Infolists\Components\Section::make('Other Information')
                    // ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('legal_document')->listWithLineBreaks()
                            ->bulleted(),
                        \Filament\Infolists\Components\TextEntry::make('bank.bank_type'),
                        TextEntry::make('tax_register')
                            ->badge()
                            ->color(fn(string $state): string => match ($state) {
                                '' => 'gray',
                                '0' => 'warning',
                                '1' => 'success',
                                'rejected' => 'danger',
                            })
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
