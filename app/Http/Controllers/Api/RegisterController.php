<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\RegisterRequest;
use Carbon\Carbon;
use Modules\Users\Dto\RegisterDTO;
use Modules\Users\Resources\AuthUserResource;
use Modules\Users\Services\AuthService;

class RegisterController extends Controller
{
    public function __construct(
        protected AuthService $authService
    )
    {
    }

    public function register(RegisterRequest $request)
    {
        $dto = RegisterDto::fromRequest($request);
        if ($this->authService->register($dto)) {
//        $user->auth_token = $user->createToken('auth', ['*'], Carbon::now()->addDays(120))->plainTextToken;
            return response()->json([
                'message' => __('Registered successfully'),
                'status' => 200,
            ], 200);
        }
    }
}
