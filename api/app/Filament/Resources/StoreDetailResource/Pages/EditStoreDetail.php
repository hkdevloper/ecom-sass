<?php

namespace App\Filament\Resources\StoreDetailResource\Pages;

use App\Filament\Resources\StoreDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditStoreDetail extends EditRecord
{
    protected static string $resource = StoreDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
