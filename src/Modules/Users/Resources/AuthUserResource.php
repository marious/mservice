<?php

namespace Modules\Users\Resources;

use Illuminate\Http\Request;
use Modules\Core\CustomResource;

class AuthUserResource extends CustomResource
{
    public function data(Request $request): array
    {
        return [
            'id' => $this->resource->id,
            'name' => $this->resource->name,
            'phone' => $this->resource->phone,
            'national_id' => $this->resource->national_id,
            'reg_number' => $this->resource->reg_number,
            'settings' => [
                'lang' => $this->resource->lang,
                'notification_enabled' => $this->resource->notification_enabled,
            ],
            'auth_token' => $this->resource->auth_token,
        ];
    }
}