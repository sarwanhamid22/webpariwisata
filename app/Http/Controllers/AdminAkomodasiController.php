<?php

namespace App\Http\Controllers;

use App\Models\Akomodasi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminAkomodasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akomodasis = Akomodasi::latest()->paginate(5);
        return view('admin.akomodasi.index', compact('akomodasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.akomodasi.create');
    }

    public function show($id)
    {
        $akomodasi = \App\Models\Akomodasi::with('images')->findOrFail($id);
        return view('admin.akomodasi.show', compact('akomodasi'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'harga_mulai' => 'nullable|numeric',
            'kontak' => 'nullable|string',
            'images' => 'required|array|min:1|max:6',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $akomodasi = Akomodasi::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama) . '-' . uniqid(),
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'lokasi' => $request->lokasi,
            'harga_mulai' => $request->harga_mulai,
            'kontak' => $request->kontak,
        ]);

        // Simpan semua gambar
        foreach ($request->file('images') as $imageFile) {
            $imagePath = $imageFile->store('akomodasi', 'public');
            $akomodasi->images()->create(['image' => $imagePath]);
        }

        return redirect()->route('admin.akomodasi.index')->with('success', 'Akomodasi berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $akomodasi = Akomodasi::with('images')->findOrFail($id);
        return view('admin.akomodasi.edit', compact('akomodasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $akomodasi = Akomodasi::with('images')->findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string',
            'lokasi' => 'nullable|string',
            'harga_mulai' => 'nullable|numeric',
            'kontak' => 'nullable|string',
            'images' => 'nullable|array|min:1|max:6',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:10240',
        ]);

        $akomodasi->update([
            'nama' => $request->nama,
            'slug' => $akomodasi->slug, // biarkan slug tetap
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
            'lokasi' => $request->lokasi,
            'harga_mulai' => $request->harga_mulai,
            'kontak' => $request->kontak,
        ]);

        // Jika ada gambar baru, hapus yang lama lalu simpan yang baru
        if ($request->hasFile('images')) {
            // Hapus gambar lama di storage & database
            foreach ($akomodasi->images as $image) {
                // Hapus file dari storage (cek dulu supaya aman)
                if (Storage::disk('public')->exists($image->image)) {
                    Storage::disk('public')->delete($image->image);
                }
                // Hapus dari database
                $image->delete();
            }

            // Simpan gambar baru
            foreach ($request->file('images') as $imageFile) {
                $imagePath = $imageFile->store('akomodasi', 'public');
                $akomodasi->images()->create(['image' => $imagePath]);
            }
        }

        return redirect()->route('admin.akomodasi.index')->with('success', 'Akomodasi berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $akomodasi = Akomodasi::findOrFail($id);
        $akomodasi->delete();

        return redirect()->route('admin.akomodasi.index')->with('success', 'Akomodasi berhasil dihapus!');
    }
}
