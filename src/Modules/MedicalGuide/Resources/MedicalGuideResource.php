<?php

namespace Modules\MedicalGuide\Resources;

use Illuminate\Http\Request;
use Modules\Core\CustomResource;

class MedicalGuideResource extends CustomResource
{

    public function data(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'title' => $this->resource->title,
            'description' => $this->resource->description,
            'address' => $this->resource->address,
            'type' => $this->resource->type,
            'lat' => (float)$this->resource->lat,
            'lng' => (float)$this->resource->lng,
        ];
    }
}