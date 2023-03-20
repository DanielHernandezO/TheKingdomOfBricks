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
        $viewData['reviews'] = Review::all();

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

    public function create(): View
    {
        return view('admin.review.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Review::validate($request);
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
