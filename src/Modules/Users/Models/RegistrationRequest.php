<?php

namespace Modules\Users\Models;

use Modules\Core\Builders\OtpQueryBuilder;
use Modules\Core\Models\CustomModel;

class RegistrationRequest extends CustomModel
{
    protected $fillable = [
        'phone',
        'national_id',
        'reg_code',
        'active',
        'documents',
    ];

    protected $casts = [
        'active' => 'boolean',
        'documents' => 'array',
    ];

    public function newEloquentBuilder($query): OtpQueryBuilder
    {
        return new OtpQueryBuilder($query);
    }
}