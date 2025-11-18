<?php

namespace App\Filament\Resources\DigitalPrototypingFeatures\Pages;

use App\Filament\Resources\DigitalPrototypingFeatures\DigitalPrototypingFeatureResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListDigitalPrototypingFeatures extends ListRecords
{
    protected static string $resource = DigitalPrototypingFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
