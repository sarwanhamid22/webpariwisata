<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Menampilkan halaman galeri publik.
     */
    public function index()
    {
        $items = Galeri::where('status', 'aman')
            ->orderBy('created_at', 'desc')
            ->paginate(8);

        return view('galeri.index', compact('items'));
    }
}
