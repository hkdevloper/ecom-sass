<?php

namespace App\Filament\Resources\StoreDetailResource\Pages;

use App\Filament\Resources\StoreDetailResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStoreDetails extends ListRecords
{
    protected static string $resource = StoreDetailResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
