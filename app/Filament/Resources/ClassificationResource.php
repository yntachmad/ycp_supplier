<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Classification;
use PhpParser\Node\Stmt\Label;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ClassificationResource\Pages;
use App\Filament\Resources\ClassificationResource\RelationManagers;

class ClassificationResource extends Resource
{
    protected static ?string $model = Classification::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-open';

    // protected static ?string $activeNavigationIcon = 'heroicon-o-folder-open';

    protected static ?string $navigationLabel = 'Services';
    protected static ?string $modelLabel = 'Services';
    protected static ?string $slug = 'services';
    protected static ?string $label = 'services';

    protected ?string $subheading = 'This is the subheading.';

    // protected static ?string $recordTitleAttribute = 'null';


    protected static ?string $navigationGroup = 'System Management';
    protected static ?int $navigationSort = 1;

    // public static function getNavigationBadge(): ?string
    // {
    //     return static::getModel()::count();
    // }



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('classification_name')
                    ->required()
                    ->label('Service Name')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('classification_name')
                    ->label('Services Name')
                    ->searchable(),
                // Tables\Columns\TextColumn::make('deleted_at')
                //     ->dateTime()
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
            ])->defaultPaginationPageOption(50)
            ->filters([
                // Tables\Filters\TrashedFilter::make(),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClassifications::route('/'),
            // 'create' => Pages\CreateClassification::route('/create'),
            // 'view' => Pages\ViewClassification::route('/{record}'),
            // 'edit' => Pages\EditClassification::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('classification_name')->label('Service Name')
            ]);
    }
}
