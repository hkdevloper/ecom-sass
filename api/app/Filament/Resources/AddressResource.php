<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AddressResource\Pages;
use App\Filament\Resources\AddressResource\RelationManagers;
use App\Models\Address;
use App\Models\Country;
use App\Models\State;
use App\Utils\Generic;
use Dotswan\MapPicker\Fields\Map;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Collection;

class AddressResource extends Resource
{
    protected static ?string $model = Address::class;

    protected static ?string $navigationIcon = 'heroicon-o-map';
    protected static ?string $navigationGroup = 'Locations';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('address')
                    ->required()
                    ->maxLength(191),
                TextInput::make('address2')
                    ->maxLength(191),
                TextInput::make('landmark')
                    ->maxLength(191),
                TextInput::make('pin_code')
                    ->required()
                    ->maxLength(191),
                TextInput::make('latitude')
                    ->default('22.5726')
                    ->maxLength(191),
                TextInput::make('longitude')
                    ->default('88.3639')
                    ->maxLength(191),
                TextInput::make('type')
                    ->maxLength(191),
                Select::make('country_id')
                    ->label('Country')
                    ->preload()
                    ->live(onBlur: true)
                    ->relationship('country', 'name')
                    ->searchable()
                    ->required(),
                Select::make('state_id')
                    ->label('State')
                    ->options(fn(Get $get): ?Collection => Country::find($get('country_id'))?->states?->pluck('name', 'id'))
                    ->live(onBlur: true)
                    ->searchable()
                    ->preload()
                    ->required(),
                Select::make('city_id')
                    ->label('City')
                    ->options(fn(Get $get): ?Collection => State::find($get('state_id'))?->cities?->pluck('name', 'id'))
                    ->native(false)
                    ->searchable()
                    ->preload()
                    ->required(),
                Map::make('location')
                    ->label('Location')
                    ->columnSpanFull()
                    ->afterStateUpdated(function (Get $get, Set $set, string|array|null $old, ?array $state): void {
                        $set('latitude', $state['lat']);
                        $set('longitude', $state['lng']);
                    })
                    ->afterStateHydrated(function ($state, $record, Set $set): void {
                        $set('location', ['lat' => $record->latitude ?? 0, 'lng' => $record->longitude ?? 0]);
                    })
                    ->liveLocation()
                    ->showMarker()
                    ->markerColor('#22c55eff')
                    ->showFullscreenControl()
                    ->showZoomControl()
                    ->draggable()
                    ->tilesUrl('https://tile.openstreetmap.de/{z}/{x}/{y}.png')
                    ->zoom(15)
                    ->detectRetina()
                    ->showMyLocationButton()
                    ->extraTileControl([])
                    ->extraControl([
                        'zoomDelta' => 1,
                        'zoomSnap' => 2,
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('address')
                    ->searchable(),
                Tables\Columns\TextColumn::make('address2')
                    ->searchable(),
                Tables\Columns\TextColumn::make('landmark')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pin_code')
                    ->searchable(),
                Tables\Columns\TextColumn::make('latitude')
                    ->searchable(),
                Tables\Columns\TextColumn::make('longitude')
                    ->searchable(),
                Tables\Columns\TextColumn::make('type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('city.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('state.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('country.name')
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
            'index' => Pages\ManageAddresses::route('/'),
        ];
    }
}
