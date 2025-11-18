<?php

namespace App\Filament\Resources\DigitalPrototypingFeatures;

use App\Filament\Resources\DigitalPrototypingFeatures\Pages\CreateDigitalPrototypingFeature;
use App\Filament\Resources\DigitalPrototypingFeatures\Pages\EditDigitalPrototypingFeature;
use App\Filament\Resources\DigitalPrototypingFeatures\Pages\ListDigitalPrototypingFeatures;
use App\Filament\Resources\DigitalPrototypingFeatures\Schemas\DigitalPrototypingFeatureForm;
use App\Filament\Resources\DigitalPrototypingFeatures\Tables\DigitalPrototypingFeaturesTable;
use App\Models\DigitalPrototypingFeature;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class DigitalPrototypingFeatureResource extends Resource
{
    protected static ?string $model = DigitalPrototypingFeature::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::CalendarDays;

    protected static ?string $recordTitleAttribute = 'main_title';

    public static function form(Schema $schema): Schema
    {
        return DigitalPrototypingFeatureForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DigitalPrototypingFeaturesTable::configure($table);
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
            'index' => ListDigitalPrototypingFeatures::route('/'),
            'create' => CreateDigitalPrototypingFeature::route('/create'),
            'edit' => EditDigitalPrototypingFeature::route('/{record}/edit'),
        ];
    }
}
