<?php

namespace App\Filament\Resources\DigitalPrototypingFeatures\Schemas;

use Filament\Schemas\Schema;

class DigitalPrototypingFeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Schemas\Components\Section::make('English Content')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('kicker_text')
                            ->required()
                            ->default('CAD & Production Planning'),
                        \Filament\Forms\Components\TextInput::make('main_title')
                            ->required()
                            ->default('Digital Prototyping: Visualize Your Masterpiece'),
                        \Filament\Forms\Components\TextInput::make('section_heading')
                            ->required()
                            ->default('From Sketch to Solid File'),
                        \Filament\Forms\Components\Textarea::make('paragraph_1_en')
                            ->required()
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Textarea::make('paragraph_2_en')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                \Filament\Schemas\Components\Section::make('Arabic Content')
                    ->schema([
                        \Filament\Forms\Components\TextInput::make('kicker_text_ar'),
                        \Filament\Forms\Components\TextInput::make('main_title_ar'),
                        \Filament\Forms\Components\Textarea::make('paragraph_1_ar')
                            ->columnSpanFull(),
                        \Filament\Forms\Components\Textarea::make('paragraph_2_ar')
                            ->columnSpanFull(),
                    ]),
                \Filament\Schemas\Components\Section::make('Images')
                    ->schema([
                        \Filament\Forms\Components\FileUpload::make('image_hero_url')
                            ->label('Hero Image (The Final Render)')
                            ->image()
                            ->required()
                            ->directory('digital-prototyping'),
                        \Filament\Forms\Components\FileUpload::make('image_detail_url')
                            ->label('Detail Image (Close-up Wireframe)')
                            ->image()
                            ->directory('digital-prototyping'),
                        \Filament\Forms\Components\FileUpload::make('image_production_url')
                            ->label('Production Image (Wax Print)')
                            ->image()
                            ->directory('digital-prototyping'),
                    ]),
            ]);
    }
}
