<?php

namespace App\Filament\Resources\Workflows\Schemas;

use Filament\Schemas\Schema;

class WorkflowForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('kicker')
                    ->required()
                    ->maxLength(255)
                    ->default('Digital Precision from Concept to Production'),
                \Filament\Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255)
                    ->default('Seamless 4-Step 3D Design Workflow'),
                \Filament\Forms\Components\Textarea::make('description')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
