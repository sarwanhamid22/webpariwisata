<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blog;
use App\Models\Galeri;
use App\Models\Destinasi;
use App\Models\Review;
use App\Models\HeroSlide;
use App\Models\Akomodasi;
use App\Models\PenyediaTur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;



class DashboardController extends Controller
{
    /**
     * Tampilkan halaman dashboard admin.
     */
    public function index()
    {
        $totalUsers     = User::where('role', 'user')->count();
        $totalMemoars   = Blog::count();
        $totalGaleri    = Galeri::count();
        $totalDestinasi = Destinasi::count();
        $totalReviews   = Review::count();
        $totalAkomodasi = Akomodasi::count();
        $totalOperators = PenyediaTur::count();

        $totalKunjunganDestinasi = visits(Destinasi::class)->count();
        $topDestinasiByVisit = visits(Destinasi::class)->top(5);


        // Ambil max 2 slide aktif untuk tampilan dashboard
        $heroSlides = HeroSlide::where('is_active', true)
            ->orderBy('order')
            ->take(2)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalMemoars',
            'totalGaleri',
            'totalDestinasi',
            'totalReviews',
            'heroSlides',
            'totalKunjunganDestinasi',
            'topDestinasiByVisit',
            'totalAkomodasi',
            'totalOperators'
        ));
    }

    public function storeMultiHeroSlide(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string',
            'images' => 'required|array|min:2|max:2',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:5120',
        ]);

        // BUAT UUID SEKALI SAJA DI SINI
        $groupId = (string) \Illuminate\Support\Str::uuid();

        foreach ($request->file('images') as $index => $imageFile) {
            $imagePath = $imageFile->store('hero', 'public');

            HeroSlide::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'image' => $imagePath,
                'is_active' => $request->has('is_active'),
                'order' => $index + 1,
                'group_id' => $groupId, // ✅ INI WAJIB ADA!
            ]);
        }


        return redirect()->back()->with('success', 'Dua slide berhasil disimpan!');
    }




    public function destroyHeroSlideGroup($group_id)
    {
        $slides = HeroSlide::where('group_id', $group_id)->get();

        if ($slides->isEmpty()) {
            return back()->with('error', 'Data tidak ditemukan.');
        }

        foreach ($slides as $slide) {
            if ($slide->image && Storage::disk('public')->exists($slide->image)) {
                Storage::disk('public')->delete($slide->image);
            }
            $slide->delete();
        }

        return back()->with('success', 'Slide hero telah dihapus sepenuhnya.');
    }
}
