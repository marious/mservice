<?php

namespace Modules\Users\Dto;

class LoginDTO
{
    public function __construct(
        public readonly string  $phone,
        public readonly string  $password,
        public readonly ?bool   $remember = false,
        public readonly ?string $deviceName = null
    )
    {
    }

    public static function fromRequest($request): self
    {
        return new self(
            phone: $request->phone,
            password: $request->password,
            remember: $request->remember,
            deviceName: $request->device_name,
        );
    }
}