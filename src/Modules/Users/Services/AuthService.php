<?php

namespace Modules\Users\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Modules\Core\Models\Otp;
use Modules\Users\Dto\LoginDTO;
use Modules\Users\Dto\RegisterDTO;
use Modules\Users\Models\User;
use Illuminate\Validation\ValidationException;

class AuthService
{
    public function register(RegisterDto $dto): User
    {
//        // Verify that the phone has been verified
//        $verifiedPhoneOtp = Otp::where('phone', $dto->phone)
//            ->where('action', 'register')
//            ->where('verified_at', '!=', null)
//            ->where('verified_at', '>', now()->subMinutes(3))
//            ->where('is_used', false)
//            ->latest()
//            ->first();
//        if (!$verifiedPhoneOtp) {
//            throw ValidationException::withMessages([
//                'phone' => [__('This phone number has not been verified.')],
//            ]);
//        }
        return User::create([
            'name' => $dto->name,
            'phone' => $dto->phone,
            'password' => bcrypt($dto->password),
            'national_id' => $dto->nationalId,
            'reg_number' => $dto->regNumber,
        ]);
    }

    public function login(LoginDTO $dto)
    {
        $credentials = [
            'phone' => $dto->phone,
            'password' => $dto->password,
        ];

        if (!Auth::attempt($credentials, $dto->remember)) {
            throw ValidationException::withMessages([
                'phone' => [__('auth.failed')],
            ]);
        }

        $user = Auth::user();

        if (!$user->active) {
            throw ValidationException::withMessages([
                'email' => [__('auth.inactive')],
            ]);
        }

        // Revoke any existing tokens
        $user->tokens()->where('name', 'auth_token')->delete();

        // Create token with expiration
        $expiresAt = Carbon::now()->addDays(120);
        $accessToken = $user->createToken($this->generateDeviceName(), ['*'], $expiresAt);
        $user->auth_token = $accessToken->plainTextToken;

        return $user;
    }

    public function logout(): bool
    {
        $user = Auth::user();

        if ($user) {
            // For API logout - revoke all tokens
            if (request()->expectsJson()) {
//                $user->tokens()->delete();
                $user->currentAccessToken()->delete();
            } else {
                Auth::logout();
                request()->session()->invalidate();
                request()->session()->regenerateToken();
            }

            return true;
        }

        return false;
    }

    private function generateDeviceName(): string
    {
        // Get user agent
        $userAgent = request()->header('User-Agent');

        // Try to identify device type
        $deviceType = 'unknown';
        if (str_contains($userAgent, 'Mobile') || str_contains($userAgent, 'Android') || str_contains($userAgent, 'iPhone')) {
            $deviceType = 'mobile';
        } elseif (str_contains($userAgent, 'Tablet') || str_contains($userAgent, 'iPad')) {
            $deviceType = 'tablet';
        } else {
            $deviceType = 'desktop';
        }

        // Add timestamp to make it unique
        return $deviceType . '_' . now()->timestamp;
    }
}