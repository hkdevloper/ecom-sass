<?php

namespace App\Filament\Store\Resources;

use App\Filament\Store\Resources\StoreResource\Pages;
use App\Models\Store;
use App\Utils\Generic;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StoreResource extends Resource
{
    protected static ?string $model = Store::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'My Stores';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id()),
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make([
                            Forms\Components\TextInput::make('name')
                                ->label('Store Name')
                                ->hint('Enter store name')
                                ->required()
                                ->maxLength(191),
                            Forms\Components\TextInput::make('phone')
                                ->label('Phone Number')
                                ->hint('Enter store phone number')
                                ->tel()
                                ->required()
                                ->maxLength(191),
                            Forms\Components\TextInput::make('email')
                                ->label('Email Address')
                                ->hint('Enter store email address')
                                ->email()
                                ->required()
                                ->maxLength(191),
                            Forms\Components\Select::make('category_id')
                                ->relationship('category', 'name')
                                ->native(false)
                                ->searchable()
                                ->preload()
                                ->required(),
                        ]),
                        Forms\Components\RichEditor::make('description')
                            ->columnSpanFull(),

                    ])->columnSpan(['lg' => 2]),
                Forms\Components\Group::make()
                ->schema([
                    Forms\Components\Section::make([
                        Forms\Components\FileUpload::make('logo')
                            ->image(),
                        Forms\Components\FileUpload::make('cover_image')
                            ->image(),
                    ]),
                    Forms\Components\Section::make('store_details')
                        ->heading('Store Details')
                        ->relationship('details')
                        ->schema([
                            Forms\Components\TextInput::make('slug')
                                ->hidden()
                                ->default('')
                                ->required()
                                ->maxLength(191),
                            Forms\Components\TextInput::make('website')
                                ->maxLength(191),
                            Forms\Components\TextInput::make('working_days'),
                            Forms\Components\TimePicker::make('opening_time')
                                ->required(),
                            Forms\Components\TimePicker::make('closing_time')
                                ->required(),
                        ]),
                ])->columnSpan(['lg' => 1]),
                Generic::getAddressForm('address', hideType: true),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('logo')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('cover_image'),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('address.id')
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
            'index' => Pages\ListStores::route('/'),
            'create' => Pages\CreateStore::route('/create'),
            'edit' => Pages\EditStore::route('/{record}/edit'),
        ];
    }
}
