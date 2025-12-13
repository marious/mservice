<?php

namespace Modules\Courses\Services;

use Modules\Courses\Models\Course;

class CoursesService
{
    protected function baseQuery()
    {
        return Course::query()->where('is_active', true);
    }

    public function getCourses($limit = 100)
    {
        return $this->baseQuery()
            ->orderByDesc('is_featured')
            ->limit($limit)
            ->get();
    }

    public function search(string $keyword = '', string $type = '', $limit = 100)
    {
        return $this->baseQuery()
            ->when($type, function ($query) use ($type) {
                $query->where('type', strtolower($type));
            })
            ->when($keyword, function ($query) use ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->Where('title', 'LIKE', "%{$keyword}%")
                        ->orWhere('description', 'LIKE', "%{$keyword}%");
                });
            })
            ->orderByDesc('is_featured')
            ->limit($limit)
            ->get();
    }
}