<?php

namespace App\Filament\Resources\AgtaAwards\Pages;

use App\Filament\Resources\AgtaAwards\AgtaAwardResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditAgtaAward extends EditRecord
{
    protected static string $resource = AgtaAwardResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
