<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Destinasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    // Menyimpan review baru
    public function store(Request $request)
    {
        $request->validate([
            'destinasi_slug' => 'required|exists:destinasis,slug',
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:60',
        ]);

        $destinasi = Destinasi::where('slug', $request->destinasi_slug)->firstOrFail();

        // Cek apakah user sudah pernah review destinasi ini
        $existingReview = Review::where('destinasi_id', $destinasi->id)
            ->where('user_id', Auth::id())
            ->first();

        if ($existingReview) {
            return response()->json(['error' => 'Anda sudah memberikan review.'], 400);
        }

        // Kalau belum pernah review, buat review baru
        $review = Review::create([
            'destinasi_id' => $destinasi->id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return response()->json([
            'success' => true,
            'review' => $review
        ]);
    }

    // Menampilkan semua review untuk destinasi (optional, jika dipakai di admin atau publik)
    public function index($slug)
    {
        $destinasi = Destinasi::where('slug', $slug)->firstOrFail();

        $reviews = Review::where('destinasi_id', $destinasi->id)
            ->latest()
            ->take(10)
            ->get();

        return response()->json($reviews);
    }

    // Menampilkan review milik user login untuk destinasi tertentu
    public function showUserReview($slug)
    {
        $destinasi = Destinasi::where('slug', $slug)->firstOrFail();

        $review = Review::where('destinasi_id', $destinasi->id)
            ->where('user_id', Auth::id())
            ->first();

        return response()->json($review);
    }

    // Update review yang sudah ada (berdasarkan ID review)
    public function update(Request $request, Review $review)
    {
        // Pastikan user yang edit adalah ownernya
        if ($review->user_id !== Auth::id()) {
            return response()->json(['error' => 'Tidak diizinkan.'], 403);
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:60',
        ]);

        $review->update([
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return response()->json(['success' => true, 'review' => $review]);
    }
}
