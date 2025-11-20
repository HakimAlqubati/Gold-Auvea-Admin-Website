<?php

namespace App\Filament\Resources\Categories\Schemas;

use Filament\Schemas\Schema;

class CategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\TextInput::make('name_ar')
                    ->required()
                    ->maxLength(100)
                    ->label('Name (Arabic)'),
                \Filament\Forms\Components\TextInput::make('name_en')
                    ->required()
                    ->maxLength(100)
                    ->label('Name (English)'),
                \Filament\Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(120)
                    ->unique(ignoreRecord: true),
                \Filament\Forms\Components\TextInput::make('data_filter')
                    ->required()
                    ->maxLength(50)
                    ->helperText('Used for frontend filtering, e.g., rings, bridal'),
                \Filament\Forms\Components\Toggle::make('is_active')
                    ->required()
                    ->default(true),
            ]);
    }
}
