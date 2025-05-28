<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with('destinasi')
            ->where('user_id', Auth::id())
            ->latest()
            ->paginate(3);

        return view('users.review.index', compact('reviews'));
    }


    public function edit(Review $review)
    {
        return view('users.review.edit', compact('review'));
    }

    public function update(Request $request, Review $review)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'review' => 'required|string|max:60',
        ]);

        $review->update([
            'rating' => $request->rating,
            'review' => $request->review,
        ]);

        return redirect()->route('user.review.index')->with('edit_success', 'Review berhasil diperbarui!');
    }

    public function destroy(Review $review)
    {
        $review->delete();

        return redirect()->route('user.review.index')->with('delete_success', 'Review berhasil dihapus.');
    }
}
