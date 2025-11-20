<?php

namespace App\Filament\Resources\Designs\Schemas;

use Filament\Schemas\Schema;

class DesignForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                \Filament\Forms\Components\Select::make('category_id')
                    ->relationship('category', 'name_ar')
                    ->required(),
                \Filament\Forms\Components\TextInput::make('name_ar')
                    ->required()
                    ->maxLength(255)
                    ->label('Name (Arabic)'),
                \Filament\Forms\Components\TextInput::make('name_en')
                    ->required()
                    ->maxLength(255)
                    ->label('Name (English)'),
                \Filament\Forms\Components\Textarea::make('description_ar')
                    ->columnSpanFull()
                    ->label('Description (Arabic)'),
                \Filament\Forms\Components\FileUpload::make('cad_file_path')
                    ->label('CAD File (STL/3DM)')
                    ->directory('designs/cad'),
                \Filament\Forms\Components\FileUpload::make('preview_image')
                    ->image()
                    ->directory('designs/previews'),
                \Filament\Forms\Components\Toggle::make('is_round_image')
                    ->required()
                    ->default(false)
                    ->helperText('Apply round styling to the image'),
            ]);
    }
}
