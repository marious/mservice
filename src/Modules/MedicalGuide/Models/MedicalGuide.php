<?php

namespace Modules\MedicalGuide\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Models\CustomModel;
use Modules\MedicalGuide\Builders\MedicalGuideBuilder;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class MedicalGuide extends CustomModel implements HasMedia
{
    use InteractsWithMedia, SoftDeletes, HasTranslations;

    protected $fillable = ['title', 'description', 'address', 'type', 'lat', 'lng', 'is_featured', 'is_active'];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];

    public $translatable = ['title', 'description', 'address'];

    public function newEloquentBuilder($query): MedicalGuideBuilder
    {
        return new MedicalGuideBuilder($query);
    }
}