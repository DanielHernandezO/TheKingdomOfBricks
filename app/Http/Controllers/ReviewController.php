<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = __('commons.reviewTitle');
        $viewData['subtitle'] = __('commons.reviewList');
        $viewData['reviews'] = Review::all();

        return view('admin.review.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $viewData = [];
            $review = Review::findOrFail($id);
            $viewData['title'] = __('commons.reviewTitle');
            $viewData['subtitle'] = __('commons.review', ['id' => $review->getId()]);
            $viewData['review'] = $review;

            return view('admin.review.show')->with('viewData', $viewData);
        } catch (Exception $e) {
            return redirect()->route('admin.index');
        }
    }

    public function create(): View
    {
        $viewData = []; //to be sent to the view
        $viewData['title'] = __('admin.createReview');

        return view('admin.review.create')->with('viewData', $viewData);
    }

    public function save(Request $request): RedirectResponse
    {
        $request->validate([
            'rating' => 'required',
            'comment' => 'required',
        ]);
        Review::create($request->only(['rating', 'comment']));

        return back()->withSuccess(__('admin.reviewCreated'));
    }

    public function delete(string $id): RedirectResponse
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return redirect()->route('admin.review.index');
    }
}
