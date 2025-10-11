<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::orderBy('created_at', 'desc')->get();
        return view('admin.reviews.index', compact('reviews'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'approved' => 'boolean'
        ]);

        Review::create($validated);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review created successfully.');
    }

    public function approve($id)
    {
        $review = Review::findOrFail($id);
        $review->update(['approved' => !$review->approved]);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review status updated.');
    }

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string',
            'approved' => 'boolean'
        ]);

        $review->update($validated);

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review updated successfully.');
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.reviews.index')
            ->with('success', 'Review deleted successfully.');
    }
}
