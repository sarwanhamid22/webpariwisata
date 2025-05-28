<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::with(['user', 'destinasi'])
            ->latest()
            ->paginate(5);

        return view('admin.review.index', compact('reviews'));
    }

    /**
     * Hapus review dari database.
     */
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.review.index')
            ->with('delete_success', 'Review berhasil dihapus!');
    }
}
