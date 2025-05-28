<?php

namespace App\Http\Controllers;

use App\Models\PenyediaTur;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class AdminPenyediaTurController extends Controller
{
    public function index()
    {
        $penyediaTurs = PenyediaTur::latest()->paginate(5);
        return view('admin.penyediatur.index', compact('penyediaTurs'));
    }

    public function show($id)
    {
        $penyediaTur = PenyediaTur::findOrFail($id);

        return view('admin.penyediatur.show', compact('penyediaTur'));
    }

    public function create()
    {
        return view('admin.penyediatur.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|in:tour,dive',
            'lokasi' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'nomor' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('penyedia-tur', 'public');
        }

        PenyediaTur::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama) . '-' . uniqid(),
            'jenis' => $request->jenis,
            'lokasi' => $request->lokasi,
            'alamat' => $request->alamat,
            'nomor' => $request->nomor,
            'email' => $request->email,
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.penyedia-tur.index')->with('success', 'Penyedia Tur berhasil ditambahkan!');
    }


    public function edit(PenyediaTur $penyediaTur)
    {
        return view('admin.penyediatur.edit', compact('penyediaTur'));
    }

    public function update(Request $request, PenyediaTur $penyediaTur)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|in:tour,dive',
            'lokasi' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'nomor' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($penyediaTur->image && Storage::disk('public')->exists($penyediaTur->image)) {
                Storage::disk('public')->delete($penyediaTur->image);
            }
            $imagePath = $request->file('image')->store('penyedia-tur', 'public');
            $penyediaTur->image = $imagePath;
        }

        $penyediaTur->update([
            'nama' => $request->nama,
            'jenis' => $request->jenis,
            'lokasi' => $request->lokasi,
            'alamat' => $request->alamat,
            'nomor' => $request->nomor,
            'email' => $request->email,
        ]);

        return redirect()->route('admin.penyedia-tur.index')->with('success', 'Penyedia Tur berhasil diperbarui!');
    }

    public function destroy(PenyediaTur $penyediaTur)
    {
        if ($penyediaTur->image && Storage::disk('public')->exists($penyediaTur->image)) {
            Storage::disk('public')->delete($penyediaTur->image);
        }
        $penyediaTur->delete();

        return redirect()->route('admin.penyedia-tur.index')->with('success', 'Penyedia Tur berhasil dihapus!');
    }
}
