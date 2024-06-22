<?php

namespace App\Filament\Store\Resources\ProductResource\Pages;

use App\Filament\Store\Resources\ProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;
}
