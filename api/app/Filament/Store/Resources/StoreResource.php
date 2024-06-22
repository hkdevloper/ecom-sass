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
                        Generic::getAddressForm('address', hideType: true),
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
                                Forms\Components\TextInput::make('website')
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('working_days')
                                    ->numeric()
                                    ->helperText('e.g. 1,2,3,4,5 for Mon-Fri, 6,7 for Sat-Sun')
                                    ->hint('Enter working days')
                                    ->maxLength(191),
                                Forms\Components\TimePicker::make('opening_time')
                                    ->helperText('e.g. 09:00 AM')
                                    ->required(),
                                Forms\Components\TimePicker::make('closing_time')
                                    ->helperText('e.g. 06:00 PM')
                                    ->required(),
                            ]),
                        Forms\Components\Section::make('store_social_media')
                            ->heading('Store Social Media')
                            ->relationship('socialMedia')
                            ->schema([
                                Forms\Components\TextInput::make('facebook')
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('twitter')
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('instagram')
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('linkedin')
                                    ->maxLength(191),
                                Forms\Components\TextInput::make('youtube')
                                    ->maxLength(191),
                            ]),
                    ])->columnSpan(['lg' => 1]),
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
                Tables\Columns\TextColumn::make('thumbnail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category.name')
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
