<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StoreDetailResource\Pages;
use App\Filament\Resources\StoreDetailResource\RelationManagers;
use App\Models\StoreDetail;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StoreDetailResource extends Resource
{
    protected static ?string $model = StoreDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Store Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('store_id')
                    ->relationship('store', 'name')
                    ->required(),

                Forms\Components\TextInput::make('website')
                    ->maxLength(191),
                Forms\Components\TextInput::make('working_days'),
                Forms\Components\TextInput::make('opening_time')
                    ->required()
                    ->maxLength(191),
                Forms\Components\TextInput::make('closing_time')
                    ->required()
                    ->maxLength(191),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('store.name')
                    ->numeric()
                    ->sortable(),

                Tables\Columns\TextColumn::make('website')
                    ->searchable(),
                Tables\Columns\TextColumn::make('opening_time')
                    ->searchable(),
                Tables\Columns\TextColumn::make('closing_time')
                    ->searchable(),
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
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListStoreDetails::route('/'),
            'create' => Pages\CreateStoreDetail::route('/create'),
            'edit' => Pages\EditStoreDetail::route('/{record}/edit'),
        ];
    }
}
