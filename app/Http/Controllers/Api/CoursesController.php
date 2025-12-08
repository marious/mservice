<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Courses\Models\Course;
use Modules\Courses\Resources\CourseResource;
use Modules\Courses\Resources\CoursesResource;
use Modules\Courses\Services\CoursesService;

class CoursesController extends Controller
{
    public function __construct(
        protected CoursesService $coursesService
    )
    {
    }

    public function index(Request $request)
    {
        $keyword = $request->input('search');
        $type = $request->input('type');
        $limit = $request->input('limit', 100);

        if ($keyword || $type) {
            $courses = $this->coursesService->search($keyword ?? '', $type ?? '', $limit);
        } else {
            $courses = $this->coursesService->getCourses($limit);
        }

        return response()->json([
            'courses' => CoursesResource::collection($courses)
        ]);
    }

    public function show(Course $course)
    {
        return response()->json([
            'course' => CourseResource::make($course)
        ]);
    }
}
