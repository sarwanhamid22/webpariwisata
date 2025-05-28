<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminMemoarController extends Controller
{
    /**
     * Tampilkan semua memoar (blog) dari user.
     */
    public function index()
    {
        $memoars = Blog::with('user')->latest()->paginate(5);
        return view('admin.memoar.index', compact('memoars'));
    }

    /**
     * Tampilkan detail memoar tertentu berdasarkan slug.
     */
    public function show($slug)
    {
        $memoar = Blog::with('user')->where('slug', $slug)->firstOrFail();
        return view('admin.memoar.show', compact('memoar'));
    }

    /**
     * Hapus memoar berdasarkan slug.
     */
    public function destroy($slug)
    {
        $memoar = Blog::where('slug', $slug)->firstOrFail();

        // Hapus gambar jika ada
        if ($memoar->image && Storage::exists('public/' . $memoar->image)) {
            Storage::delete('public/' . $memoar->image);
        }

        $memoar->delete();

        return redirect()->route('admin.memoar.index')->with('delete_success', 'Memoar berhasil dihapus!');
    }

    /**
     * Update status & catatan admin.
     */
    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:aman,ditahan',
            'catatan_admin' => 'nullable|string',
        ]);

        $memoar = Blog::findOrFail($id);
        $memoar->status = $request->status;
        $memoar->catatan_admin = $request->catatan_admin;
        $memoar->save();

        return redirect()->back()->with('success', 'Status memoar berhasil diperbarui.');
    }
}
