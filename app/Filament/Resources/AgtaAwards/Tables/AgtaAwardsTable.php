<?php

namespace App\Filament\Resources\AgtaAwards\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class AgtaAwardsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kicker')
                    ->label('Kicker'),
                TextColumn::make('title')
                    ->label('Title'),
                ImageColumn::make('drawing_image')->alignCenter()->circular()
                    ->label('Drawing Image'),
                ImageColumn::make('final_piece_image')->alignCenter()->circular()
                    ->label('Final Piece Image'),
                TextColumn::make('description_top')->limit(10)
                    ->label('Description Top'),
                TextColumn::make('description_bottom')->limit(10)
                    ->label('Description Bottom'),
                TextColumn::make('note')->limit(10)
                    ->label('Note'),

                ToggleColumn::make('is_active')->disabled()->alignCenter()
                    ->label('Is Active'),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
