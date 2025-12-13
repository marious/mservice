<?php

namespace App\Filament\Resources\Blogs\Schemas;

use AbdulmajeedJamaan\FilamentTranslatableTabs\TranslatableTabs;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\View;
use Filament\Schemas\Schema;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TranslatableTabs::make('anyLabel')
                    ->schema([
                        TextInput::make("title")->required(),
                        TextInput::make("description")->required(),
                        Textarea::make("content")->required(),
                    ]),
                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->directory('blogs')
                    ->visibility('public')
                    ->acceptedFileTypes(['image/*'])
                    ->maxSize(5120)
                    ->imageEditor()
                    ->openable()
                    ->downloadable()
                    ->previewable()
                    ->deletable()
                    ->loadingIndicatorPosition('left')
                    ->panelAspectRatio('2:1')
                    ->panelLayout('integrated')
                    ->removeUploadedFileButtonPosition('right')
                    ->uploadButtonPosition('left')
                    ->uploadProgressIndicatorPosition('left')
                    ->disk('public')
                    ->preserveFilenames(),
                Checkbox::make('is_published')
            ]);
    }
}
