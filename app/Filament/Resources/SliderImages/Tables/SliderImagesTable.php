<?php

namespace App\Filament\Resources\SliderImages\Tables;

use App\Models\SliderImage;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class SliderImagesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image_path')
                    ->label('Image')
                    ->circular()
                    // ->size(80)
                    ->imageSize(80),

                TextColumn::make('title_ar')
                    ->label('Title')
                    ->searchable()
                    ->limit(40),

                TextColumn::make('caption_ar')
                    ->label('Caption')
                    ->limit(50),

                TextColumn::make('link_url')
                    ->label('URL')
                    ->limit(40)
                    ->toggleable(),

                TextColumn::make('sort_order')
                    ->label('Order')
                    ->sortable(),

                IconColumn::make('is_active')
                    ->boolean()
                    ->label('Active'),
            ])

            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Active Status')
                    ->boolean(),
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
