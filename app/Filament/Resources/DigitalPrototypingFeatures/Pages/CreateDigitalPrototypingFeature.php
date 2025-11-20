<?php

namespace App\Filament\Resources\DigitalPrototypingFeatures\Pages;

use App\Filament\Resources\DigitalPrototypingFeatures\DigitalPrototypingFeatureResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDigitalPrototypingFeature extends CreateRecord
{
    protected static string $resource = DigitalPrototypingFeatureResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
