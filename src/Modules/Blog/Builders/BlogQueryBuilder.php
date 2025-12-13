<?php

namespace Modules\Blog\Builders;

use Illuminate\Database\Eloquent\Builder;

class BlogQueryBuilder extends Builder
{
    public function latestBlog(): self
    {
        return $this->where('is_published', true)->latest()->take(20);
    }
}
