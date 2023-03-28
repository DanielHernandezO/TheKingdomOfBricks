<?php

namespace App\Http\Controllers;

use App\Models\Item;
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
            $item = Item::findOrFail($id);
            $viewData['item'] = $item;

            return view('user.item.show')->with('viewData', $viewData);
        } catch (Exception $e) {
            return redirect()->route('user.item.index');
        }
    }

}
