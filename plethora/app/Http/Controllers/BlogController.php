<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return Blog::all();
    }

    public function show(Blog $blog)
    {
        if ($blog = Blog::find($id))
        {
            return $blog;
        }

        return RespHandler::not_exist();
    }

    public function store(Request $request)
    {
        try {
            $blog_id = Blog::create($request->all())->id;
        } catch (QueryException $e) {
            return RespHandler::not_created();
        }

        return RespHandler::created($blog_id);
    }

    public function update(Request $request, Blog $blog)
    {
        $blog->update($request->all());
        
        return response()->json($blog, 200);
    }

    public function delete(Blog $blog)
    {
        $blog->delete();

        return response()->json(null, 204);
    }
}