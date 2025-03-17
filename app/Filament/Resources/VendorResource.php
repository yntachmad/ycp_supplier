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
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use App\Models\SubClassification;
use Illuminate\Support\Collection;


use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\CheckboxList;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\VendorResource\Pages;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\VendorResource\RelationManagers;

class VendorResource extends Resource
{
    protected static ?string $model = Vendor::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

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
                Select::make('group_id')
                    ->relationship(name: 'group', titleAttribute: 'group_name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Group Name'),

                Select::make('category_id')
                    ->relationship(name: 'category', titleAttribute: 'category_name')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Category Name'),

                Select::make('classification_id')
                    ->relationship(name: 'classification', titleAttribute: 'classification_name')
                    ->afterStateUpdated(function (Set $set) {
                        $set('subClassification_id', null);
                    })
                    ->searchable()
                    ->preload()
                    ->required()
                    ->live()
                    ->label('Services'),

                Select::make('subClassification_id')
                    // ->relationship(name: 'subClassification', titleAttribute: 'subclassification_name')
                    ->options(fn(Get $get): Collection => SubClassification::query()->where('classification_id', $get('classification_id'))->pluck('subclassification_name', 'id'))
                    ->searchable()
                    ->preload()
                    ->live()
                    ->required()
                    ->label('Sub Services'),

                // Forms\Components\TextInput::make('subClassification_id')
                //     ->numeric(),
                Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),

                Select::make('type_company_id')
                    ->relationship(name: 'TypeCompany', titleAttribute: 'companyType')
                    ->searchable()
                    ->preload()
                    ->required()
                    ->label('Type of Company'),


                // Forms\Components\TextInput::make('typeCompany_id')
                //     ->numeric(),
                Forms\Components\TextInput::make('supplier_name')
                    ->required()
                    ->maxLength(255),
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
                Forms\Components\TextInput::make('website')
                    ->maxLength(255),
                Forms\Components\Textarea::make('address')
                    ->required()
                    ->columnSpanFull(),

                Select::make('province_id')
                    ->relationship(name: 'province', titleAttribute: 'province')
                    ->afterStateUpdated(function (Set $set) {
                        $set('city_id', null);
                    })
                    ->searchable()
                    ->preload()
                    ->required()
                    ->live()
                    ->label('Province'),

                Select::make('city_id')
                    // ->relationship(name: 'subClassification', titleAttribute: 'subclassification_name')
                    ->options(fn(Get $get): Collection => City::query()->where('province_id', $get('province_id'))->pluck('city', 'id'))
                    ->searchable()
                    ->preload()
                    ->live()
                    ->required()
                    ->label('City'),



                // Forms\Components\TextInput::make('legal_document')
                //     ->maxLength(255),
                \Filament\Forms\Components\Toggle::make('tax_register'),
                // Forms\Components\TextInput::make('tax_register')
                //     ->required(),
                \Filament\Forms\Components\Toggle::make('Terms_condition'),
                // Forms\Components\TextInput::make('Terms_condition')
                //     ->required(),

                CheckboxList::make('legal_document')
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
                    ->columns(2)
                    ->bulkToggleable(),

                Radio::make('type_bank_id')
                    ->options(fn(): Collection => Bank::query()->pluck('bank_type', 'id'))->label('Type of Bank'),
                // Forms\Components\TextInput::make('typebank_id')
                //     ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('group.group_name')

                    ->sortable(),
                Tables\Columns\TextColumn::make('category.category_name')

                    ->sortable(),
                Tables\Columns\TextColumn::make('classification.classification_name')

                    ->sortable(),
                Tables\Columns\TextColumn::make('subClassification_id')
                    ->sortable(),

                Tables\Columns\TextColumn::make('TypeCompany.companyType')

                    ->sortable(),
                Tables\Columns\TextColumn::make('supplier_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_person')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('contact_email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->searchable(),
                Tables\Columns\TextColumn::make('province.province')

                    ->sortable(),
                Tables\Columns\TextColumn::make('city.city')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('legal_document')
                    ->searchable(),
                ToggleColumn::make('tax_register'),
                ToggleColumn::make('Terms_condition'),
                // Tables\Columns\TextColumn::make('tax_register'),
                // Tables\Columns\TextColumn::make('Terms_condition'),

                Tables\Columns\TextColumn::make('type_bank_id')

                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                // TextEntry::make('category_name')->label('Category'),
                // TextEntry::make('category_description')->label('Description'),

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
            'edit' => Pages\EditVendor::route('/{record}/edit'),
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
