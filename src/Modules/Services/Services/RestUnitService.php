<?php

namespace Modules\Services\Services;

use Modules\Services\Models\RestUnit;

class RestUnitService
{
    private function baseQuery()
    {
        return RestUnit::query()->where('is_active', true);
    }

    public function getList(int $limit = 100, $offset = 0)
    {
        return $this->baseQuery()->paginate($limit);
    }
}