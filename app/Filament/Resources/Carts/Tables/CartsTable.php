<?php

namespace App\Filament\Resources\Carts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Table;

class CartsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('user.name')
                    ->label('User ID')
                    ->searchable(),
               
                \Filament\Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('items')
                    ->label('Items')
                    ->counts('items')->alignCenter()
                    ->searchable(),
                \Filament\Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->alignCenter()
                    ->searchable(),
           

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
