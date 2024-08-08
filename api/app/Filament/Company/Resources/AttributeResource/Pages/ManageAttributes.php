<?php

namespace App\Filament\Company\Resources\AttributeResource\Pages;

use App\Filament\Company\Resources\AttributeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageAttributes extends ManageRecords
{
    protected static string $resource = AttributeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
