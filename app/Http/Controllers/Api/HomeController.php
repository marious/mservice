<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Blog\Models\Blog;
use Modules\Blog\Resources\BlogResource;
use Modules\Services\Resources\ServicesResource;
use Modules\Services\Services\ServicesService;
use Modules\Users\Resources\NormalUserResource;

class HomeController extends Controller
{
    public function __construct(
        protected ServicesService $services
    )
    {
    }

    public function index()
    {
        $normalServices = $this->services->getNormalServices(2);

        if (Auth::guard('sanctum')->check()) {
            $user = Auth::guard('sanctum')->user();
            $featuredServices = $this->services->getFeaturedServices(6);
            return response()->json([
                'user' => NormalUserResource::make($user),
                'main_image' => ['url' => null],
                'featured_services' => ServicesResource::collection($featuredServices),
                'normal_services' => ServicesResource::collection($normalServices),
            ]);
        }

        return response()->json([
            'user' => null,
            'main_image' => ['url' => null],
            'normal_services' => ServicesResource::collection($normalServices),
            'news' => BlogResource::collection(Blog::latest()->limit(2)->get()),
        ]);
    }
}
