<?php

namespace App\Utils;

use App\Models\Attribute;
use App\Models\Country;
use App\Models\State;
use Dotswan\MapPicker\Fields\Map;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ToggleButtons;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Illuminate\Support\Collection;

class Generic
{
    public static function getAttributeTypes(): array
    {
        return [
            'text' => 'Text',
            'textarea' => 'Textarea',
            'select' => 'Select',
            'multiselect' => 'Multiselect',
            'checkbox' => 'Checkbox',
            'radio' => 'Radio',
            'toggle' => 'Toggle',
            'toggle_buttons' => 'Toggle Buttons',
            'date' => 'Date',
            'time' => 'Time',
            'datetime' => 'Datetime',
            'file' => 'File',
            'image' => 'Image',
            'color' => 'Color',
            'price' => 'Price',
            'weight' => 'Weight',
            'dimension' => 'Dimension',
            'rich_editor' => 'Rich Editor',
            'markdown_editor' => 'Markdown Editor',
        ];
    }
    public static function getAttributeFormFields($attribute): array
    {
        $formFields = [];
        switch ($attribute->type) {
            case 'text':
                $formFields[] = TextInput::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->default($attribute->default)
                    ->prefix($attribute->prefix)
                    ->suffix($attribute->suffix)
                    ->hintColor($attribute->hint_color)
                    ->unique($attribute->is_unique)
                    ->required($attribute->is_required);
                break;
            case 'textarea':
                $formFields[] = Textarea::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->default($attribute->default)
                    ->required($attribute->is_required);
                break;
            case 'select':
                $formFields[] = Select::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->hintColor($attribute->hint_color)
                    ->options($attribute->values->pluck('value', 'value'))
                    ->required($attribute->is_required);
                break;
            case 'multiselect':
                $formFields[] = Select::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->hintColor($attribute->hint_color)
                    ->options($attribute->values->pluck('value', 'value'))
                    ->multiple()
                    ->required($attribute->is_required);
                break;
            case 'checkbox':
                $formFields[] = Checkbox::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->hintColor($attribute->hint_color)
                    ->required($attribute->is_required);
                break;
            case 'radio':
                $formFields[] = Radio::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->hintColor($attribute->hint_color)
                    ->options($attribute->values->pluck('value', 'value'))
                    ->required($attribute->is_required);
                break;
            case 'date':
                $formFields[] = Datepicker::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->hintColor($attribute->hint_color)
                    ->required($attribute->is_required);
                break;
            case 'time':
                $formFields[] = Timepicker::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->hintColor($attribute->hint_color)
                    ->required($attribute->is_required);
                break;
            case 'datetime':
                $formFields[] = Datetimepicker::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->hintColor($attribute->hint_color)
                    ->required($attribute->is_required);
                break;
            case 'file':
                $formFields[] = FileUpload::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->hintColor($attribute->hint_color)
                    ->required($attribute->is_required);
                break;
            case 'image':
                $formFields[] = FileUpload::make($attribute->name)
                    ->label($attribute->label)
                    ->image()
                    ->hint($attribute->hint)
                    ->hintColor($attribute->hint_color)
                    ->required($attribute->is_required);
                break;
            case 'color':
                $formFields[] = Colorpicker::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->hintColor($attribute->hint_color)
                    ->required($attribute->is_required);
                break;
            case 'price':
                $formFields[] = TextInput::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->default($attribute->default)
                    ->prefix('$')
                    ->required($attribute->is_required);
                break;
            case 'weight':
                $formFields[] = TextInput::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->default($attribute->default)
                    ->numeric()
                    ->suffix('kg')
                    ->required($attribute->is_required);
                break;
            case 'dimension':
                $formFields[] = TextInput::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->default($attribute->default)
                    ->numeric()
                    ->suffix('cm')
                    ->required($attribute->is_required);
                break;
            case 'rich_editor':
                $formFields[] = RichEditor::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->required($attribute->is_required);
                break;
            case 'markdown_editor':
                $formFields[] = MarkdownEditor::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->required($attribute->is_required);
                break;
            case 'toggle':
                $formFields[] = Toggle::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->hintColor($attribute->hint_color)
                    ->required($attribute->is_required);
                break;
            case 'toggle_buttons':
                $formFields[] = ToggleButtons::make($attribute->name)
                    ->label($attribute->label)
                    ->hint($attribute->hint)
                    ->hintColor($attribute->hint_color)
                    ->options([
                        'true' => 'Yes',
                        'false' => 'No',
                    ])
                    ->required($attribute->is_required);
                break;
            default:
                break;
        }
        return $formFields;
    }
    public static function getAddressForm(string $relationship, string $field = 'address_id', bool $hideMap = false, bool $hideType = false): Section
    {
        return Section::make($field)
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
                    ->hidden($hideType)
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
                    ->hidden($hideMap)
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
            ])
            ->columnSpanFull()
            ->relationship($relationship)
            ->heading('Address')
            ->label('Address')
            ->lazy()
            ->columns(3);
    }

}
