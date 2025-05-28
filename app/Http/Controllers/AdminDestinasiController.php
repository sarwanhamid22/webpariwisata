<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class AdminDestinasiController extends Controller
{
    public function index()
    {
        $destinasis = Destinasi::latest()->paginate(5);
        return view('admin.destinasi.index', compact('destinasis'));
    }

    public function create()
    {
        return view('admin.destinasi.create');
    }

    private function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $original = $slug;
        $count = 1;

        while (Destinasi::where('slug', $slug)->exists()) {
            $slug = $original . '-' . $count++;
        }

        return $slug;
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:10240',
            'vr_link' => 'required',
            'vr_link.*' => 'image|mimes:jpeg,jpg|max:102400',
        ]);

        $imagePath = $request->file('image')->store('destinasi', 'public');

        $vrPaths = [];
        if ($request->hasFile('vr_link')) {
            foreach ($request->file('vr_link') as $vrFile) {
                $vrPaths[] = $vrFile->store('vr', 'public');
            }
        }

        $destinasi = Destinasi::create([
            'title' => $request->title,
            'slug' => $this->generateUniqueSlug($request->title),
            'description' => $request->description,
            'location' => $request->location,
            'image' => $imagePath,
            'vr_link' => !empty($vrPaths) ? json_encode($vrPaths) : null,
        ]);

        return redirect()->route('admin.destinasi.show', $destinasi->slug)
            ->with('success', 'Destinasi berhasil ditambahkan!');
    }

    public function show($slug)
    {
        $destinasi = Destinasi::where('slug', $slug)->firstOrFail();
        return view('admin.destinasi.show', compact('destinasi'));
    }

    public function edit($slug)
    {
        $destinasi = Destinasi::where('slug', $slug)->firstOrFail();
        return view('admin.destinasi.edit', compact('destinasi'));
    }

    public function update(Request $request, $slug)
    {
        $destinasi = Destinasi::where('slug', $slug)->firstOrFail();

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10240',
            'vr_link.*' => 'nullable|image|mimes:jpeg,jpg|max:102400',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
        ];

        // Tambahan: ubah slug hanya jika judul berubah
        if ($request->title !== $destinasi->title) {
            $data['slug'] = $this->generateUniqueSlug($request->title);
        }

        if ($request->hasFile('image')) {
            if ($destinasi->image && Storage::disk('public')->exists($destinasi->image)) {
                Storage::disk('public')->delete($destinasi->image);
            }
            $data['image'] = $request->file('image')->store('destinasi', 'public');
        }

        if ($request->hasFile('vr_link')) {
            if ($destinasi->vr_link) {
                $oldVrFiles = json_decode($destinasi->vr_link, true);
                if (is_array($oldVrFiles)) {
                    foreach ($oldVrFiles as $file) {
                        if (Storage::disk('public')->exists($file)) {
                            Storage::disk('public')->delete($file);
                        }
                    }
                }
            }

            $vrPaths = [];
            foreach ($request->file('vr_link') as $vrFile) {
                $vrPaths[] = $vrFile->store('vr', 'public');
            }
            $data['vr_link'] = json_encode($vrPaths);
        }

        $destinasi->update($data);

        return redirect()->route('admin.destinasi.show', $destinasi->slug)
            ->with('edit_success', 'Destinasi berhasil diperbarui!');
    }


    public function destroy($slug)
    {
        $destinasi = Destinasi::where('slug', $slug)->firstOrFail();

        if ($destinasi->image && Storage::disk('public')->exists($destinasi->image)) {
            Storage::disk('public')->delete($destinasi->image);
        }

        if ($destinasi->vr_link) {
            $vrFiles = json_decode($destinasi->vr_link, true);
            if (is_array($vrFiles)) {
                foreach ($vrFiles as $vrFile) {
                    if (Storage::disk('public')->exists($vrFile)) {
                        Storage::disk('public')->delete($vrFile);
                    }
                }
            }
        }

        $destinasi->delete();

        return redirect()->route('admin.destinasi.index')
            ->with('delete_success', 'Destinasi berhasil dihapus!');
    }
}
