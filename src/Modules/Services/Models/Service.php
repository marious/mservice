<?php

namespace Modules\Services\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Core\Models\CustomModel;
use Modules\Services\Builders\ServiceQueryBuilder;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Translatable\HasTranslations;

class Service extends CustomModel implements HasMedia
{
    use InteractsWithMedia, SoftDeletes, HasTranslations;

    protected $fillable = ['title', 'description', 'is_active', 'is_featured'];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
    ];
    public $translatable = ['title', 'description'];

    public function newEloquentBuilder($query): ServiceQueryBuilder
    {
        return new ServiceQueryBuilder($query);
    }

    public function scopeFeatured()
    {
        return $this->where('is_featured', true);
    }
}