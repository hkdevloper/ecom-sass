<?php

namespace App\Filament\Store\Resources;

use App\Filament\Store\Resources\AttributeResource\Pages;
use App\Filament\Store\Resources\AttributeResource\RelationManagers;
use App\Models\Attribute;
use App\Utils\Generic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AttributeResource extends Resource
{
    protected static ?string $model = Attribute::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Product';
    protected static ?string $navigationLabel = 'Attributes';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('store_id')
                    ->label('Store')
                    ->hint('Select store')
                    ->relationship('store', 'name')
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('name')
                    ->label('Attribute Name')
                    ->hint('Considers as column name')
                    ->validationAttribute('lowercase')
                    ->required()
                    ->maxLength(191),
                Forms\Components\Select::make('type')
                    ->options(Generic::getAttributeTypes())
                    ->label('Attribute Type')
                    ->hint('Select attribute type')
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->required(),
                Forms\Components\TextInput::make('label')
                    ->label('Enter Field Label')
                    ->hint('Enter field label')
                    ->maxLength(191),
                Forms\Components\TextInput::make('default')
                    ->label('Default Value')
                    ->hint('Enter default value')
                    ->maxLength(191),
                Forms\Components\TextInput::make('hint')
                    ->label('Hint')
                    ->hint('Hint text will be displayed here')
                    ->maxLength(191),
                Forms\Components\TextInput::make('helper_text')
                    ->label('Helper Text')
                    ->hint('Enter helper text')
                    ->helperText('Helper text will be displayed below the field')
                    ->maxLength(191),
                Forms\Components\ColorPicker::make('hint_color')
                    ->label('Hint Color')
                    ->hint('Select hint color')
                    ->default('#000000')
                    ->hidden()
                    ->filled()
                    ->requiredIf('hint', '!=', ''),
                Forms\Components\TextInput::make('prefix')
                    ->prefix('X')
                    ->hint('Enter prefix')
                    ->label('Prefix')
                    ->maxLength(191),
                Forms\Components\TextInput::make('suffix')
                    ->label('Suffix')
                    ->hint('Enter suffix')
                    ->suffix('X')
                    ->maxLength(191),
                Forms\Components\Group::make()->schema([
                    Forms\Components\Toggle::make('is_required')
                        ->label('Is Required')
                        ->hint('Select if required')
                        ->required(),
                    Forms\Components\Toggle::make('is_unique')
                        ->label('Is Unique')
                        ->hint('Select if unique')
                        ->required(),
                ]),
                Forms\Components\ToggleButtons::make('status')
                    ->required()
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                    ])
                    ->label('Status')
                    ->inline()
                    ->default('active'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('label')
                    ->searchable(),
                Tables\Columns\TextColumn::make('default')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hint')
                    ->searchable(),
                Tables\Columns\TextColumn::make('hint_color')
                    ->searchable(),
                Tables\Columns\TextColumn::make('prefix')
                    ->searchable(),
                Tables\Columns\TextColumn::make('suffix')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_required')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_unique')
                    ->boolean(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('store.name')
                    ->numeric()
                    ->sortable(),
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
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAttributes::route('/'),
        ];
    }
}
