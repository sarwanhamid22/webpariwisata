<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminGaleriController extends Controller
{
    /**
     * Menampilkan semua galeri yang dibuat user.
     */
    public function index()
    {
        $galeris = Galeri::with('user')->latest()->paginate(5);
        return view('admin.galeri.index', compact('galeris'));
    }

    /**
     * Menampilkan detail satu galeri berdasarkan slug.
     */
    public function show($slug)
    {
        $galeri = Galeri::with('user')->where('slug', $slug)->firstOrFail();
        return view('admin.galeri.show', compact('galeri'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:aman,ditahan',
            'catatan_admin' => 'nullable|string',
        ]);

        $galeri = Galeri::findOrFail($id);
        $galeri->status = $request->status;
        $galeri->catatan_admin = $request->catatan_admin;
        $galeri->save();

        return redirect()->back()->with('success', 'Status galeri berhasil diperbarui.');
    }


    /**
     * Menghapus galeri berdasarkan slug.
     */
    public function destroy($slug)
    {
        $galeri = Galeri::where('slug', $slug)->firstOrFail();

        // Hapus file gambar dari storage (jika ada)
        if ($galeri->image && Storage::disk('public')->exists($galeri->image)) {
            Storage::disk('public')->delete($galeri->image);
        }

        // Hapus data dari database
        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('delete_success', 'Galeri berhasil dihapus!');
    }
}
