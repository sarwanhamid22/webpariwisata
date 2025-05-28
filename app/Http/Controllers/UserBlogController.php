<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserBlogController extends Controller
{
    public function index()
    {
        $posts = Blog::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(5);

        return view('users.blog.index', compact('posts'));
    }

    public function create()
    {
        return view('users.blog.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'    => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'content'  => 'required',
            'image'    => 'nullable|image|mimes:jpeg,jpg,png,webp|max:10240',
        ]);

        $blog = new Blog();
        $blog->title        = $validated['title'];
        $blog->location     = $validated['location'];
        $blog->content      = $validated['content'];
        $blog->user_id      = Auth::id();
        $blog->slug         = Str::slug($validated['title'], '-');
        $blog->published_at = now();
        $blog->status        = 'aman';
        $blog->catatan_admin = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('blog_images', 'public');
            $blog->image = $path;
        }

        $blog->save();

        return redirect()->route('user.blog.show', $blog->slug)
            ->with('success', 'Memoar berhasil dibuat!');
    }


    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('users.blog.show', compact('blog'));
    }

    public function edit($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('users.blog.edit', compact('blog'));
    }

    public function update(Request $request, $slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $validated = $request->validate([
            'title'    => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'content'  => 'required',
            'image'    => 'nullable|image|mimes:jpeg,jpg,png,webp|max:10240',
        ]);

        $blog->title    = $validated['title'];
        $blog->location = $validated['location'];
        $blog->content  = $validated['content'];
        $blog->slug     = Str::slug($validated['title'], '-');

        if ($request->hasFile('image')) {
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $path = $request->file('image')->store('blog_images', 'public');
            $blog->image = $path;
        }

        $blog->save();

        return redirect()->route('user.blog.show', $blog->slug)
            ->with('edit_success', 'Memoar berhasil diperbarui!');
    }

    public function destroy($slug)
    {
        $blog = Blog::where('slug', $slug)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('user.blog.index')
            ->with('delete_success', 'Memoar berhasil dihapus!');
    }
}
