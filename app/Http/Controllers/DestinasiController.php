<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\Review;
use App\Models\Galeri;
use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    public function index()
    {
        $destinasis = Destinasi::latest()->paginate(6);
        return view('destinasi.index', compact('destinasis'));
    }

    public function show($slug)
    {
        $destinasi = Destinasi::where('slug', $slug)->firstOrFail();

        // ✅ Tambahkan tracking kunjungan
        visits($destinasi)->increment(); // satu kunjungan baru

        // ✅ Ambil total kunjungan khusus destinasi ini
        $jumlahKunjungan = visits($destinasi)->count();

        // Ambil galeri berdasarkan lokasi
        $galeri = Galeri::whereRaw('LOWER(title) LIKE ?', ['%' . strtolower($destinasi->location) . '%'])->get();

        // Ambil semua review untuk destinasi ini
        $reviews = Review::where('destinasi_id', $destinasi->id)
            ->with('user')
            ->latest()
            ->get();

        return view('destinasi.show', compact('destinasi', 'galeri', 'reviews', 'jumlahKunjungan'));
    }
}
