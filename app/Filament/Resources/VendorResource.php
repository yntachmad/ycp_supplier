<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Bank;
use App\Models\City;
use Filament\Forms\Components\Group;
use Filament\Tables;
use App\Models\Vendor;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;

use Filament\Tables\Table;

use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use App\Models\SubClassification;


use Illuminate\Support\Collection;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Toggle;
// use Filament\Forms\Components\Section;
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

    // protected static ?string $recordTitleAttribute = 'Test';


    // protected static bool $shouldRegisterNavigation = false;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    // protected static ?string $navigationParentItem = 'Notifications';



    protected static ?string $navigationBadgeTooltip = 'The number of Vendors';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                \Filament\Forms\Components\Section::make()
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
                            ->label('Services'),

                        \Filament\Forms\Components\Select::make('subclassification_id')
                            // ->relationship(name: 'subClassification', titleAttribute: 'subclassification_name')
                            ->options(fn(Get $get): Collection => SubClassification::query()->where('classification_id', $get('classification_id'))->pluck('subclassification_name', 'id'))
                            ->searchable()
                            ->preload()
                            ->live()
                            // ->required()
                            ->label('Sub Services'),
                        \Filament\Forms\Components\Select::make('category_id')
                            ->relationship(name: 'Category', titleAttribute: 'category_name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->label('Category'),
                        \Filament\Forms\Components\Select::make('group_id')
                            ->relationship(name: 'group', titleAttribute: 'group_name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->label('Group'),

                    ])->columns(2),
                \Filament\Forms\Components\Section::make('Vendor Profile')
                    // ->description('Add Information details')
                    ->schema([
                        Forms\Components\TextInput::make('supplier_name')
                            ->required()
                            ->maxLength(255),
                        \Filament\Forms\Components\Select::make('type_company_id')
                            ->relationship(name: 'TypeCompany', titleAttribute: 'companyType')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->label('Type of Company'),




                        \Filament\Forms\Components\Group::make()
                            ->schema([
                                Forms\Components\TextInput::make('contact_person')
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('contact_phone')
                                    ->tel()
                                    ->required()
                                    ->maxLength(255),
                                Forms\Components\TextInput::make('contact_email')
                                    ->email()
                                    ->maxLength(255),
                            ])->columns(3)->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->label('Description / Product ')
                            ->required()
                            ->columnSpanFull(),
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

                        \Filament\Forms\Components\Group::make()
                            ->schema([
                                Checkbox::make('tax_register'),
                                // Forms\Components\TextInput::make('tax_register')
                                //     ->required(),
                                // \Filament\Forms\Components\Toggle::make('Terms_condition'),
                                Checkbox::make('Terms_condition'),
                            ])->columns(2),
                        \Filament\Forms\Components\CheckboxList::make('legal_document')
                            ->options([
                                'ID Card' => 'ID Card',
                                'SIUP' => 'SIUP',
                                'NPWP' => 'NPWP',
                                'Financial Audited Statement' => 'Financial Audited Statement',
                                'Domicilie' => 'Domicilie',
                                'Akta Pendirian' => 'Akta Pendirian',
                                'Akta Notaris' => 'Akta Notaris',
                                'Bank Account' => 'Bank Account',
                            ])
                            ->columns(2),
                        // ->bulkToggleable(),

                        \Filament\Forms\Components\Radio::make('bank_id')
                            ->options(fn(): Collection => Bank::query()->pluck('bank_type', 'id'))->label('Type of Account Bank'),

                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
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
                    ->weight(FontWeight::Bold)
                    ->description(fn(Vendor $record): string => $record->TypeCompany['companyType'])
                    ->searchable(),
                Tables\Columns\TextColumn::make('province.province')
                    ->description(fn(Vendor $record): string => $record->city['city'])
                    ->label('Location')
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->wrap()
                    ->words(15)
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


                Tables\Columns\TextColumn::make('category.category_name')
                    // ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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

                Tables\Filters\TrashedFilter::make(),
                SelectFilter::make('type_company_id')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship(name: 'TypeCompany', titleAttribute: 'companyType'),

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
                        \Filament\Infolists\Components\TextEntry::make('supplier_name'),
                        \Filament\Infolists\Components\TextEntry::make('contact_person'),
                        \Filament\Infolists\Components\TextEntry::make('contact_phone'),
                    ])->columns(3),
                \Filament\Infolists\Components\Section::make('Rate limiting')
                    ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        \Filament\Infolists\Components\TextEntry::make('contact_email'),
                        \Filament\Infolists\Components\TextEntry::make('contact_phone'),
                        \Filament\Infolists\Components\TextEntry::make('supplier_name'),
                        \Filament\Infolists\Components\TextEntry::make('typeCompany.companyType'),
                    ]),

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
