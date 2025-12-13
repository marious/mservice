<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Service extends Model implements HasMedia
{
    use SoftDeletes, HasTranslations, InteractsWithMedia;

    protected $fillable = ['title', 'description', 'is_featured', 'is_active'];

    public $translatable = ['title', 'description'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('icon')->singleFile();
    }
}
