<?php

namespace App\Listeners;

use App\Events\UserRegistered;
use Modules\Core\Enums\OtpEnum;
use Modules\Core\Services\OtpService;

class SendOtpVerification
{
    /**
     * Create the event listener.
     */
    public function __construct(
        protected OtpService $otpService
    )
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistered $event): void
    {
        $user = $event->user;
        $this->otpService->generatePhoneOtp($user->phone, OtpEnum::REGISTER->value);
    }
}
