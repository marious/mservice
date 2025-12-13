<?php

namespace App\Filament\Resources\Services\Schemas;

use AbdulmajeedJamaan\FilamentTranslatableTabs\TranslatableTabs;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TranslatableTabs::make('anyLabel')
                    ->schema([
                        TextInput::make("title")->required(),
                        Textarea::make("description")->required(),
                    ])
                    ->columnSpanFull(),
                FileUpload::make('icon')
                    ->label('Icon')
                    ->image()
                    ->directory('services')
                    ->visibility('public')
                    ->acceptedFileTypes(['image/*'])
                    ->maxSize(5120)
                    ->imageEditor()
                    ->openable()
                    ->downloadable()
                    ->previewable()
                    ->deletable()
                    ->loadingIndicatorPosition('left')
                    ->panelAspectRatio('5:1')
                    ->panelLayout('integrated')
                    ->removeUploadedFileButtonPosition('right')
                    ->uploadButtonPosition('left')
                    ->uploadProgressIndicatorPosition('left')
                    ->disk('public')
                    ->preserveFilenames()
                    ->columnSpanFull(),
                Checkbox::make('is_active'),
                Checkbox::make('is_featured')
            ]);
    }
}
