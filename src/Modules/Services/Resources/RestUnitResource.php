<?php

namespace Modules\Services\Resources;

use Illuminate\Http\Request;
use Modules\Core\CustomResource;
use Modules\Core\Resources\ProvinceResource;

class RestUnitResource extends CustomResource
{
    public function data(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'address' => $this->resource->address,
            'single_rooms' => $this->resource->single_rooms,
            'double_rooms' => $this->resource->double_rooms,
            'single_bed' => $this->resource->single_bed,
            'province' => ProvinceResource::make($this->resource->province),
        ];
    }
}