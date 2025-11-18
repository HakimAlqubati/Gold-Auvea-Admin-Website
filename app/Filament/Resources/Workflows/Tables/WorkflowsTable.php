<?php

namespace App\Filament\Resources\Workflows\Tables;

use App\Models\Workflow;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class WorkflowsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('kicker')
                    ->label('Kicker')
                    ->searchable()
                    ->sortable()
                    ->limit(40),

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('description')
                    ->label('Description')
                    ->limit(60)
                    ->toggleable(),

                TextColumn::make('phases_count')
                    ->label('Phases')
                    ->counts('phases')
                    ->sortable(),
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
