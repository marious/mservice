<?php

namespace Modules\Users\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

/**
 * @property mixed $lang
 * @property boolean $notification_enabled
 * @property boolean $active
 * @property mixed $role_id
 * @property string $reg_number
 * @property string $national_id
 * @property string $email
 * @property string $phone
 * @property string $name
 */
class User extends Authenticatable
{
    use HasApiTokens;

    protected $fillable = [
        'name', 'phone', 'email', 'password', 'national_id', 'reg_number', 'role_id', 'active', 'lang', 'notification_enabled',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'password' => 'hashed',
        'active' => 'boolean',
        'notification_enabled' => 'boolean',
    ];
}