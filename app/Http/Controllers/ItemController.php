<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['items'] = Item::all();

        return view('item.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        $item = Item::find($id);
        if (is_null($item)) {
            return redirect()->route('home.index');
        }

        $viewData['item'] = $item;

        return view('item.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('item.create');
    }

    public function save(Request $request): View
    {
        $request->validate([
            'title' => 'required',
            'type' => 'required',
            'price' => 'required|gt:0',
            'guide' => 'required',
            'pieces' => 'required|gt:0',
            'stock' => 'required|gt:0',
        ]);
        $viewData['item'] = $request->all();
        Item::create($request->only(['title', 'type', 'price', 'guide', 'pieces', 'stock']));

        return view('item.save')->with('viewData', $viewData);
    }

    public function delete(int $id): RedirectResponse
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('item.index');
    }
}
