<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Review;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserItemController extends Controller
{
    public function index(Request $request): View
    {
        $items = Item::query();
        $requestedType = $request->input('type');

        if ($requestedType != '') {
            $items = $items->where('type', '=', $requestedType);
        }
        $viewData = [];
        $viewData['type'] = $requestedType;
        $viewData['items'] = $items->paginate(8);

        return view('user.item.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $viewData = [];
            $item = Item::with('reviews')->findOrFail($id);
            $reviews = $item->reviews()->paginate(2);
            $viewData['item'] = $item;
            $viewData['reviews'] = $reviews;
            return view('user.item.show')->with('viewData', $viewData);
        } catch (Exception $e) {
            return redirect()->route('home.index');
        }
    }
    public function addReview(Request $request): RedirectResponse
    {
        $requestedId = $request->route('itemId');
        $item = Item::findOrFail($requestedId);
        $user = auth()->user();

        $review = new Review([
            'rating' => $request['rating'],
            'comment' => $request['comment'],
        ]);
        
        $review->setUser($user);
        $review->setItem($item);
        $review->save();
        return redirect()->back();
    }

}
