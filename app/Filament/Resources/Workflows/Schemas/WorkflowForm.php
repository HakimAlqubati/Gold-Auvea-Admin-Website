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
                    ->label('Kicker (English)')
                    ->required()
                    ->maxLength(255)
                    ->default('Digital Precision from Concept to Production'),
                \Filament\Forms\Components\TextInput::make('kicker_ar')
                    ->label('Kicker (Arabic)')
                    ->maxLength(255),
                \Filament\Forms\Components\TextInput::make('title')
                    ->label('Title (English)')
                    ->required()
                    ->maxLength(255)
                    ->default('Seamless 4-Step 3D Design Workflow'),
                \Filament\Forms\Components\TextInput::make('title_ar')
                    ->label('Title (Arabic)')
                    ->maxLength(255),
                \Filament\Forms\Components\Textarea::make('description')
                    ->label('Description (English)')
                    ->required()
                    ->columnSpanFull(),
                \Filament\Forms\Components\Textarea::make('description_ar')
                    ->label('Description (Arabic)')
                    ->columnSpanFull(),

                \Filament\Forms\Components\Repeater::make('phases')
                    ->relationship('phases')
                    ->label('Workflow Phases')->columns(5)
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('index')
                            ->label('Phase Number')
                            ->numeric()
                            ->required()
                            ->default(fn($get) => $get('../../phases') ? count($get('../../phases')) + 1 : 1),
                        \Filament\Forms\Components\TextInput::make('title')
                            ->label('Title (English)')
                            ->required()
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('title_ar')
                            ->label('Title (Arabic)')
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('tags')
                            ->label('Tags (English)')
                            ->maxLength(255),
                        \Filament\Forms\Components\TextInput::make('tags_ar')
                            ->label('Tags (Arabic)')
                            ->maxLength(255),
                        \Filament\Forms\Components\Textarea::make('description')
                            ->label('Description (English)')
                            ->required()
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Textarea::make('description_ar')
                            ->label('Description (Arabic)')
                            ->columnSpanFull(),
                    ])
                    ->orderColumn('index')
                    ->collapsible()
                    ->itemLabel(fn(array $state): ?string => $state['title'] ?? null)
                    ->columnSpanFull()
                    ->defaultItems(0),
            ]);
    }
}
