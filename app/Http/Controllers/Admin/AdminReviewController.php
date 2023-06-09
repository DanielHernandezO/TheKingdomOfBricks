<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminReviewController extends Controller
{
    public function index(Request $request): View
    {
        $minRating = $request->query('min_rating', 0);
        $maxRating = $request->query('max_rating', 5);
        $reviews = Review::whereBetween('rating', [$minRating, $maxRating])
            ->orderBy('rating', 'asc')
            ->paginate(10);
        $viewData = [];
        $viewData['reviews'] = $reviews;
        $viewData['minRating'] = $minRating;
        $viewData['maxRating'] = $maxRating;

        return view('admin.review.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $viewData = [];
            $review = Review::findOrFail($id);
            $viewData['review'] = $review;

            return view('admin.review.show')->with('viewData', $viewData);
        } catch (Exception $e) {
            return redirect()->route('admin.index');
        }
    }

    public function delete(string $id): RedirectResponse
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.review.index');
    }
}
