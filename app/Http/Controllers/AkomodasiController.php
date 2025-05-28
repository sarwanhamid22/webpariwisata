<?php

namespace App\Http\Controllers;

use App\Models\Akomodasi;
use Illuminate\Http\Request;

class AkomodasiController extends Controller
{
    // Index: tampilkan semua akomodasi
    public function index()
    {
        $akomodasis = Akomodasi::with('images')->latest()->paginate(9);

        return view('akomodasi.index', compact('akomodasis'));
    }


    public function show($slug)
    {
        $akomodasi = Akomodasi::with('images')->where('slug', $slug)->firstOrFail();
        return view('akomodasi.show', compact('akomodasi'));
    }


    // public function show($slug)
    // {
    //     // Dummy data sementara
    //     $akomodasi = (object) [
    //         'nama' => 'Hotel Cantik Dummy',
    //         'slug' => $slug,
    //         'deskripsi' => 'Ini adalah deskripsi dummy untuk hotel cantik dummy. Cocok untuk testing tampilan frontend.',
    //         'lokasi' => 'Lokasi Indah Dummy',
    //         'harga_mulai' => 350000,
    //         'kontak' => '08123456789',
    //         'images' => collect([
    //             (object) ['image' => asset('assets/images/listing/1.jpg')],
    //             (object) ['image' => asset('assets/images/listing/1.jpg')],
    //             (object) ['image' => asset('assets/images/listing/1.jpg')],
    //             (object) ['image' => asset('assets/images/listing/1.jpg')],
    //         ]),
    //     ];

    //     return view('akomodasi.show', compact('akomodasi'));
    // }

}
