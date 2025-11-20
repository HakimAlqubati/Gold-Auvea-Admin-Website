<?php

namespace App\Filament\Resources\SliderImages\Schemas;

use Filament\Schemas\Schema;

class SliderImageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\FileUpload::make('image_path')
                    ->image()
                    ->required()
                    ->directory('slider-images'),
                \Filament\Forms\Components\TextInput::make('alt_text')
                    ->required()
                    ->maxLength(255),
                \Filament\Forms\Components\TextInput::make('title_ar')
                    ->maxLength(150)
                    ->label('Title (Arabic)'),
                \Filament\Forms\Components\Textarea::make('caption_ar')
                    ->label('Caption (Arabic)'),
                \Filament\Forms\Components\TextInput::make('link_url')
                    ->url()
                    ->label('Link URL'),
                \Filament\Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
                \Filament\Forms\Components\Toggle::make('is_active')
                    ->required()
                    ->default(true),
            ]);
    }
}
