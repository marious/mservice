<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\MedicalGuide\Resources\MedicalGuideResource;
use Modules\MedicalGuide\Services\MedicalGuideService;

class MedicalGuideController extends Controller
{
    public function __construct(
        private readonly MedicalGuideService $medicalGuideService
    )
    {
    }

    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $type = $request->input('type');
        $limit = $request->input('limit', 100);

        if ($keyword || $type) {
            $medicalGuides = $this->medicalGuideService->search($keyword ?? '', $type ?? '', $limit);
        } else {
            $medicalGuides = $this->medicalGuideService->getMedicalGuides($limit);
        }

        return response()->json([
            'medical_guides' => MedicalGuideResource::collection($medicalGuides),
            'types' => [
                [
                    'key' => 'doctor',
                    'value' => __('doctor'),
                ],
                [
                    'key' => 'hospital',
                    'value' => __('hospital'),
                ],
                [
                    'key' => 'special_clinic',
                    'value' => __('special clinic'),
                ],
                [
                    'key' => 'special_clinics',
                    'value' => __('special clinics'),
                ],
            ],
        ]);
    }
}
