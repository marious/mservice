<?php

namespace App\Http\Controllers;

use Modules\Services\Services\ServicesService;

class ServicesController extends Controller
{
    public function __construct(
        protected ServicesService $servicesService
    )
    {
    }

    public function index()
    {
        return response()->json([
            'services' => $this->servicesService->getAllServices(),
        ]);
    }
}
