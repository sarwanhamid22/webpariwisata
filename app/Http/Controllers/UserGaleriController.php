<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UserGaleriController extends Controller
{

    private function generateUniqueSlug($title)
    {
        $slug = Str::slug($title) . '-' . Auth::id();
        $originalSlug = $slug;
        $counter = 1;

        while (Galeri::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Display a listing of the user's gallery items.
     */
    public function index()
    {
        $items = Galeri::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('users.galeri.index', compact('items'));
    }

    /**
     * Show the form for creating a new gallery item.
     */
    public function create()
    {
        return view('users.galeri.create');
    }

    /**
     * Store a newly created gallery item in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $galeri = new Galeri();
        $galeri->title = $validated['title'];
        $galeri->user_id = Auth::id();
        $galeri->status = 'aman';
        $galeri->catatan_admin = null;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('galeri', 'public');
            $galeri->image = $path;
        }

        $galeri->slug = $this->generateUniqueSlug($galeri->title);

        $galeri->save();

        return redirect()->route('user.galeri.show', $galeri->slug)
            ->with('success', 'Galeri berhasil dibuat dan langsung tampil di publik!');
    }




    /**
     * Display the specified gallery item.
     */
    public function show($slug)
    {
        $item = Galeri::where('slug', $slug)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('users.galeri.show', compact('item'));
    }

    /**
     * Show the form for editing the specified gallery item.
     */
    public function edit($slug)
    {
        $item = Galeri::where('slug', $slug)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        return view('users.galeri.edit', compact('item'));
    }

    /**
     * Update the specified gallery item in storage.
     */
    public function update(Request $request, $slug)
    {
        $item = Galeri::where('slug', $slug)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:10240',
        ]);

        $item->title = $validated['title'];

        if ($request->hasFile('image')) {
            if ($item->image && Storage::disk('public')->exists($item->image)) {
                Storage::disk('public')->delete($item->image);
            }
            $path = $request->file('image')->store('galeri', 'public');
            $item->image = $path;
        }

        $item->save();

        return redirect()->route('user.galeri.show', $item->slug)
            ->with('edit_success', 'Galeri berhasil diperbarui!');
    }

    /**
     * Remove the specified gallery item from storage.
     */
    public function destroy($slug)
    {
        $item = Galeri::where('slug', $slug)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        if ($item->image && Storage::disk('public')->exists($item->image)) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return redirect()->route('user.galeri.index')
            ->with('delete_success', 'Galeri berhasil dihapus!');
    }
}
