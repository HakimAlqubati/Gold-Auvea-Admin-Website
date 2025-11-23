<?php

namespace App\Filament\Resources\AgtaAwards;

use App\Models\AgtaAward;
use App\Filament\Resources\AgtaAwards\Pages\CreateAgtaAward;
use App\Filament\Resources\AgtaAwards\Pages\EditAgtaAward;
use App\Filament\Resources\AgtaAwards\Pages\ListAgtaAwards;
use App\Filament\Resources\AgtaAwards\Schemas\AgtaAwardForm;
use App\Filament\Resources\AgtaAwards\Tables\AgtaAwardsTable;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class AgtaAwardResource extends Resource
{
    protected static ?string $model = AgtaAward::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'title';

    public static function form(Schema $schema): Schema
    {
        return AgtaAwardForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return AgtaAwardsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListAgtaAwards::route('/'),
            'create' => CreateAgtaAward::route('/create'),
            'edit' => EditAgtaAward::route('/{record}/edit'),
        ];
    }
}
