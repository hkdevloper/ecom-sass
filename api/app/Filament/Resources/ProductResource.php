<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Attribute;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Product Management';

    public static function form(Form $form): Form
    {
        $attributes = Attribute::all();
        $formFields = [
            Forms\Components\TextInput::make('name')
                ->required()
                ->maxLength(191),
            Forms\Components\Textarea::make('description')
                ->columnSpanFull(),
            Forms\Components\TextInput::make('sku')
                ->label('SKU')
                ->required()
                ->maxLength(191),
            Forms\Components\TextInput::make('slug')
                ->required()
                ->maxLength(191),
            Forms\Components\TextInput::make('status')
                ->required()
                ->maxLength(191)
                ->default('active'),
            Forms\Components\TextInput::make('type')
                ->required()
                ->maxLength(191)
                ->default('product'),
            Forms\Components\TextInput::make('price')
                ->required()
                ->numeric()
                ->default(0)
                ->prefix('$'),
            Forms\Components\TextInput::make('quantity_in_stock')
                ->required()
                ->numeric()
                ->default(0),
            Forms\Components\TextInput::make('thumbnail')
                ->required()
                ->maxLength(191)
                ->default('https://via.placeholder.com/350x450'),
            Forms\Components\TextInput::make('gallery'),
            Forms\Components\Select::make('category_id')
                ->relationship('category', 'name')
                ->required(),
            Forms\Components\Select::make('store_id')
                ->relationship('store', 'name')
                ->required(),
        ];
        foreach ($attributes as $attribute) {
            match ($attribute->type) {
                'text' => $formFields[] = Forms\Components\TextInput::make($attribute)
                    ->label('this is label')
                    ->default('')
                    ->minValue(0)
                    ->maxLength(191)
                    ->hint('this is hint')
                    ->nullable()
                    ->hintColor('red')
                    ->prefix('$')
                    ->suffix('kg')
                    ->required(),
                'textarea', 'html' => $formFields[] = Forms\Components\Textarea::make($attribute)
                    ->required(),
                'select' => $formFields[] = Forms\Components\Select::make($attribute)
                    ->options($attribute->values->pluck('value', 'value')),
                'multiselect' => $formFields[] = Forms\Components\Select::make($attribute)
                    ->options($attribute->values->pluck('value', 'value'))
                    ->multiple(),
                'checkbox' => $formFields[] = Forms\Components\Checkbox::make($attribute),
                'radio' => $formFields[] = Forms\Components\Radio::make($attribute)->options($attribute->values->pluck('value', 'value')),
                'date' => $formFields[] = Forms\Components\Datepicker::make($attribute)->required(),
                'time' => $formFields[] = Forms\Components\Timepicker::make($attribute)->required(),
                'datetime' => $formFields[] = Forms\Components\Datetimepicker::make($attribute)->required(),
                'file', 'image' => $formFields[] = Forms\Components\FileUpload::make($attribute)->required(),
                'color' => $formFields[] = Forms\Components\Colorpicker::make($attribute)->required(),
                'price' => $formFields[] = Forms\Components\TextInput::make($attribute)->required()->numeric()->prefix('$'),
                'weight' => $formFields[] = Forms\Components\TextInput::make($attribute)->required()->numeric()->suffix('kg'),
                'dimension' => $formFields[] = Forms\Components\TextInput::make($attribute)->required()->numeric()->suffix('cm'),
            };
        }
        return $form->schema($formFields);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('sku')
                    ->label('SKU')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money()
                    ->sortable(),
                Tables\Columns\TextColumn::make('quantity_in_stock')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('thumbnail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
