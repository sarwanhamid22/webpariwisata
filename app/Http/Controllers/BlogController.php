<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;


class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('status', 'aman')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('blog.index', ['blogs' => $blogs]);
    }



    public function show($slug)
    {
        $blog = Blog::with(['user.socialProfile'])
            ->where('slug', $slug)
            ->firstOrFail();

        $relatedBlogs = Blog::with('user')
            ->where('location', $blog->location)
            ->where('id', '!=', $blog->id)
            ->latest()
            ->inRandomOrder()
            ->limit(3)
            ->get();

        return view('blog.show', compact('blog', 'relatedBlogs'));
    }
}
