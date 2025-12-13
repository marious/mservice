<?php

namespace App\Filament\Resources\Blogs\Pages;

use App\Filament\Resources\Blogs\BlogResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditBlog extends EditRecord
{
    protected static string $resource = BlogResource::class;

    protected $imageData = null;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        // Store image temporarily and remove from data
        $this->imageData = $data['image'] ?? null;
        unset($data['image']);

        // Ensure translatable fields are arrays, not false
        $translatableFields = ['title', 'description', 'content'];
        
        foreach ($translatableFields as $field) {
            if (!isset($data[$field]) || $data[$field] === false) {
                $data[$field] = [];
            } elseif (!is_array($data[$field])) {
                // If it's a string, convert to array with default locale
                $data[$field] = [app()->getLocale() => $data[$field]];
            }
        }

        // Generate slug from title if not provided or update existing slugs
        if (!isset($data['slug']) || $data['slug'] === false || empty($data['slug'])) {
            $data['slug'] = [];
            if (isset($data['title']) && is_array($data['title'])) {
                foreach ($data['title'] as $locale => $title) {
                    if (!empty($title)) {
                        $data['slug'][$locale] = \Illuminate\Support\Str::slug($title);
                    }
                }
            }
        } elseif (!is_array($data['slug'])) {
            // If it's a string, convert to array with default locale
            $data['slug'] = [app()->getLocale() => \Illuminate\Support\Str::slug($data['slug'])];
        } else {
            // Ensure all slug values are properly slugified
            foreach ($data['slug'] as $locale => $slugValue) {
                if (!empty($slugValue)) {
                    $data['slug'][$locale] = \Illuminate\Support\Str::slug($slugValue);
                }
            }
        }

        return $data;
    }

    protected function afterSave(): void
    {
        $this->handleImageUpload();
    }

    protected function mutateFormDataBeforeFill(array $data): array
    {
        // Load existing image from media library
        $media = $this->record->getFirstMedia('image');
        if ($media) {
            // Spatie stores files as: {id}/{filename} in storage/app/public
            // FileUpload expects files in: blogs/{filename}
            // So we need to copy the file to the blogs directory
            $sourcePath = $media->getPath();
            $fileName = $media->file_name;
            $targetDir = storage_path('app/public/blogs');
            $targetPath = $targetDir . '/' . $fileName;
            
            // Create blogs directory if it doesn't exist
            if (!file_exists($targetDir)) {
                \Illuminate\Support\Facades\File::makeDirectory($targetDir, 0755, true);
            }
            
            // Copy file to blogs directory if source exists and target doesn't or is older
            if (file_exists($sourcePath)) {
                if (!file_exists($targetPath) || filemtime($sourcePath) > filemtime($targetPath)) {
                    copy($sourcePath, $targetPath);
                }
                // Provide the path relative to storage/app/public
                $data['image'] = ['blogs/' . $fileName];
            } else {
                // If source doesn't exist, set to null
                $data['image'] = null;
            }
        } else {
            $data['image'] = null;
        }

        return $data;
    }

    protected function handleImageUpload(): void
    {
        $image = $this->imageData ?? null;
        
        // Clear existing media if image was removed
        if (empty($image)) {
            $this->record->clearMediaCollection('image');
            return;
        }

        // Handle array of file paths
        if (is_array($image) && !empty($image)) {
            $filePath = $image[0];
        } elseif (is_string($image)) {
            $filePath = $image;
        } else {
            return;
        }

        // Check if it's a new upload (starts with 'blogs/')
        // If it's a URL (http:// or https://), it's existing media, skip
        if (str_starts_with($filePath, 'http://') || str_starts_with($filePath, 'https://')) {
            // Existing media, do nothing
            return;
        }

        if (str_starts_with($filePath, 'blogs/')) {
            $fullPath = storage_path('app/public/' . $filePath);
            
            if (file_exists($fullPath)) {
                try {
                    // Clear old media
                    $this->record->clearMediaCollection('image');
                    
                    // Add new media
                    $this->record->addMedia($fullPath)
                        ->toMediaCollection('image');
                } catch (\Exception $e) {
                    \Log::error('Failed to update media: ' . $e->getMessage());
                }
            }
        }
    }
}
