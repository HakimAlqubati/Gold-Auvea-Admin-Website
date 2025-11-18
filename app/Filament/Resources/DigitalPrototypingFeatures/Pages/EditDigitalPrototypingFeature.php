<?php

namespace App\Filament\Resources\DigitalPrototypingFeatures\Pages;

use App\Filament\Resources\DigitalPrototypingFeatures\DigitalPrototypingFeatureResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditDigitalPrototypingFeature extends EditRecord
{
    protected static string $resource = DigitalPrototypingFeatureResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
