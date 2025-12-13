<?php

namespace App\Filament\Resources\Blogs\Pages;

use App\Filament\Resources\Blogs\BlogResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateBlog extends CreateRecord
{
    protected static string $resource = BlogResource::class;

    protected $imageData = null;

    protected function mutateFormDataBeforeCreate(array $data): array
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

        // Generate slug from title if not provided
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

        // Set user_id if not provided
        if (!isset($data['user_id']) || $data['user_id'] === false) {
            $data['user_id'] = auth()->id();
        }

        return $data;
    }

    protected function afterCreate(): void
    {
        $this->handleImageUpload();
    }

    protected function handleImageUpload(): void
    {
        $image = $this->imageData ?? null;
        
        if (empty($image)) {
            return;
        }

        // Handle array of file paths (Filament FileUpload returns array)
        if (is_array($image) && !empty($image)) {
            $filePath = $image[0];
        } elseif (is_string($image)) {
            $filePath = $image;
        } else {
            return;
        }

        // Skip if it's a URL (existing media from edit)
        if (str_starts_with($filePath, 'http://') || str_starts_with($filePath, 'https://')) {
            return;
        }

        // Check if it's a relative path (starts with 'blogs/')
        if (str_starts_with($filePath, 'blogs/')) {
            $fullPath = storage_path('app/public/' . $filePath);
            
            if (file_exists($fullPath)) {
                try {
                    $this->record->addMedia($fullPath)
                        ->toMediaCollection('image');
                } catch (\Exception $e) {
                    \Log::error('Failed to add media: ' . $e->getMessage());
                }
            }
        }
    }
}
