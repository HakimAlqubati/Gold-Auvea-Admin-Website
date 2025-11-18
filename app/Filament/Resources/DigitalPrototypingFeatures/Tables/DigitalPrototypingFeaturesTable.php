<?php

namespace App\Filament\Resources\DigitalPrototypingFeatures\Tables;

use App\Models\DigitalPrototypingFeature;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class DigitalPrototypingFeaturesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kicker_text')
                    ->label('Kicker')
                    ->searchable()
                    ->limit(40),

                TextColumn::make('main_title')
                    ->label('Main title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('section_heading')
                    ->label('Section heading')
                    ->limit(50)
                    ->toggleable(),

                TextColumn::make('paragraph_1_en')
                    ->label('Paragraph 1 (EN)')
                    ->limit(60)
                    ->toggleable(),

                ImageColumn::make('image_hero_url')
                    ->label('Hero image')
                    ->square()
                    ->size(60)
                    ->toggleable(),

                ImageColumn::make('image_detail_url')
                    ->label('Detail image')
                    ->square()
                    ->size(60)
                    ->toggleable(isToggledHiddenByDefault: true),

                ImageColumn::make('image_production_url')
                    ->label('Production image')
                    ->square()
                    ->size(60)
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('main_title_ar')
                    ->label('Main title (AR)')
                    ->limit(40)
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            ->filters([
                //
            ])

            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
                DeleteAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
