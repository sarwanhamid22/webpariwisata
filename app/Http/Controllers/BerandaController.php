<?php

namespace App\Http\Controllers;

use App\Models\Destinasi;
use App\Models\HeroSlide;
use App\Models\Blog;
use App\Models\Review;

class BerandaController extends Controller
{
    public function index()
    {

        $heroSlides = HeroSlide::where('is_active', true)
            ->orderBy('order')
            ->take(2)
            ->get();

        $topDestinasi = Destinasi::withCount('reviews')
            ->withAvg('reviews', 'rating')
            ->orderByDesc('reviews_count')
            ->orderByDesc('reviews_avg_rating')
            ->take(7)
            ->get();

        $newDestinasi = Destinasi::withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->latest()
            ->take(6)
            ->get();

        $blogs = Blog::where('status', 'aman')
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        $reviewTerbaru = Review::with(['user', 'destinasi'])
            ->latest()
            ->take(6)
            ->get();
        return view('welcome', compact('heroSlides', 'topDestinasi', 'newDestinasi', 'blogs', 'reviewTerbaru'));
    }
}
