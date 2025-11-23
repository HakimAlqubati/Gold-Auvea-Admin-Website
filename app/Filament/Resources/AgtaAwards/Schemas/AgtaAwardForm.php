<?php

namespace App\Filament\Resources\AgtaAwards\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class AgtaAwardForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kicker')
                    ->label('Kicker')
                    ->required(),
                TextInput::make('kicker_ar')
                    ->label('Kicker (Arabic)'),
                TextInput::make('title')
                    ->label('Title')
                    ->required(),
                TextInput::make('title_ar')
                    ->label('Title (Arabic)'),
                MarkdownEditor::make('description_top')
                    ->label('Description Top')
                    ->required(),
                MarkdownEditor::make('description_top_ar')
                    ->label('Description Top (Arabic)'),
                MarkdownEditor::make('description_bottom')
                    ->label('Description Bottom')
                    ->required(),
                MarkdownEditor::make('description_bottom_ar')
                    ->label('Description Bottom (Arabic)'),
                TextInput::make('note')
                    ->label('Note')
                    ->required(),
                TextInput::make('note_ar')
                    ->label('Note (Arabic)'),
                FileUpload::make('drawing_image')
                    ->label('Drawing Image')
                    ->required(),
                FileUpload::make('final_piece_image')
                    ->label('Final Piece Image')
                    ->required(),
                Toggle::make('is_active')
                    ->label('Is Active')
                    ->required(),
            ]);
    }
}
