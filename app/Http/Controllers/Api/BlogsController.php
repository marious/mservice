<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Modules\Blog\Models\Blog;
use Modules\Blog\Resources\BlogResource;

class BlogsController extends Controller
{
    public function index()
    {
        return BlogResource::collection(Blog::query()->latestBlog()->get());
    }

    public function show($id)
    {
        return BlogResource::make(Blog::query()
            ->where('id', $id)
            ->orWhere("slug->" . config('app.locale'), $id)
            ->first());
    }
}
