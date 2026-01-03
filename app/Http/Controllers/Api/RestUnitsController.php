<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Services\Resources\RestUnitResource;
use Modules\Services\Services\RestUnitService;

class RestUnitsController extends Controller
{
    public function __construct(
        private readonly RestUnitService $restUnitService
    )
    {
    }

    public function index(Request $request)
    {
        $units = $this->restUnitService->getList(100, $request->all());
        return response()->json([
            'units' => RestUnitResource::collection($units),
        ]);
    }

    public function subscribe()
    {
    }
}
