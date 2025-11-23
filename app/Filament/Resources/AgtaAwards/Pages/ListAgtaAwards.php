<?php

namespace App\Filament\Resources\AgtaAwards\Pages;

use App\Filament\Resources\AgtaAwards\AgtaAwardResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListAgtaAwards extends ListRecords
{
    protected static string $resource = AgtaAwardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
