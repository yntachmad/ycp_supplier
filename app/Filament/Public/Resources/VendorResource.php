<?php

namespace App\Filament\Public\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Vendor;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
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
            ->recordUrl(
                false
            )
            ->queryStringIdentifier('vendors')
            ->defaultPaginationPageOption(25)
            ->paginated([25, 50, 100, 200, 500, 'all'])
            // ->paginated(false)
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
                \Filament\Tables\Columns\ToggleColumn::make('tax_register')->hidden(),
                \Filament\Tables\Columns\ToggleColumn::make('Terms_condition')->hidden(),
                // Tables\Columns\TextColumn::make('tax_register'),
                // Tables\Columns\TextColumn::make('Terms_condition'),


                Tables\Columns\TextColumn::make('bank.bank_type')->hidden(),

                // Tables\Columns\TextColumn::make('typeCompany.companyType')
                //     ->toggleable(isToggledHiddenByDefault: true)
                //     ->label('Type of Company')
                //     ->searchable()
                //     ->sortable(),

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
                //     ->togglea
            ])
            ->filters([
                \Filament\Tables\Filters\SelectFilter::make('classification_id')
                    ->label('Services')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship(name: 'classification', titleAttribute: 'classification_name'),
                \Filament\Tables\Filters\SelectFilter::make('Category_id')
                    ->label('Category')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship(name: 'category', titleAttribute: 'category_name'),

                \Filament\Tables\Filters\SelectFilter::make('type_company_id')
                    ->label('Type of Company')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship(name: 'TypeCompany', titleAttribute: 'companyType'),



                \Filament\Tables\Filters\SelectFilter::make('province_id')
                    ->label('Provinces')
                    // ->multiple()
                    ->searchable()
                    ->preload()
                    // ->live()
                    // ->afterStateUpdated(function (Set $set) {
                    //     $set('city_id', null);
                    // })
                    ->relationship(name: 'province', titleAttribute: 'province'),
                \Filament\Tables\Filters\SelectFilter::make('city_id')
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

                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Tables\Actions\BulkActionGroup::make([
                //     Tables\Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                \Filament\Infolists\Components\Section::make()
                    // ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        TextEntry::make('classification.classification_name')
                            ->weight(FontWeight::SemiBold)
                            ->label('Service')
                            ->inlineLabel(),
                        TextEntry::make('Subclassification.subclassification_name')
                            ->label('Sub Service')
                            ->weight(FontWeight::SemiBold)
                            ->inlineLabel(),
                        TextEntry::make('category.category_name')->weight(FontWeight::SemiBold)
                            ->label('Category')->inlineLabel(),
                        TextEntry::make('group.group_name')->label('Group')->weight(FontWeight::SemiBold)
                            ->inlineLabel(),
                    ])->columns(2),
                \Filament\Infolists\Components\Section::make('Vendor Profile')
                    // ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        TextEntry::make('supplier_name')
                            ->label('Vendor Name')
                            ->weight(FontWeight::SemiBold)
                            ->inlineLabel(),
                        TextEntry::make('typeCompany.companyType')->label('Type of Company')
                            ->weight(FontWeight::SemiBold)
                            ->inlineLabel(),
                        TextEntry::make('description')
                            ->label('Description / Product ')
                            ->weight(FontWeight::SemiBold)
                            ->columnSpanFull(),

                        \Filament\Infolists\Components\Group::make()->schema([
                            TextEntry::make('contact_person')
                                ->weight(FontWeight::SemiBold),
                            TextEntry::make('contact_phone')
                                ->weight(FontWeight::SemiBold),
                            TextEntry::make('contact_email')
                                ->weight(FontWeight::SemiBold),
                        ])->columns(3)->columnSpanFull(),
                        TextEntry::make('address')
                            ->weight(FontWeight::SemiBold)
                            ->label('Address')
                            ->columnSpanFull(),
                        \Filament\Infolists\Components\Group::make()->schema([
                            TextEntry::make('province.province')
                                ->weight(FontWeight::SemiBold),
                            TextEntry::make('city.city')
                                ->weight(FontWeight::SemiBold),
                            TextEntry::make('website')
                                ->weight(FontWeight::SemiBold),
                        ])->columns(3)->columnSpanFull(),
                    ])->columns(2),
                \Filament\Infolists\Components\Section::make('Other Information')
                    // ->description('Prevent abuse by limiting the number of requests per period')
                    ->schema([
                        TextEntry::make('legal_document')
                            ->label('Legal Documents')
                            // ->size(50)
                            ->weight(FontWeight::SemiBold)
                            ->listWithLineBreaks()
                            ->bulleted(),
                        TextEntry::make('bank.bank_type')->weight(FontWeight::SemiBold)
                            ->label('Type of Account Bank')
                        ,

                        \Filament\Infolists\Components\Group::make()->schema([
                            \Filament\Infolists\Components\IconEntry::make('tax_register')
                                // ->inlineLabel()
                                ->boolean(),

                            \Filament\Infolists\Components\IconEntry::make('Terms_condition')
                                // ->inlineLabel()
                                ->boolean()
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
