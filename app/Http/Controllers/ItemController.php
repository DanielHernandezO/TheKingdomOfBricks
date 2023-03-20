<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Interfaces\ImageStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['items'] = Item::all();

        return view('admin.item.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        $viewData = [];
        $item = Item::find($id);
        if (is_null($item)) {
            return redirect()->route('admin.index');
        }

        $viewData['item'] = $item;

        return view('admin.item.show')->with('viewData', $viewData);
    }

    public function create(): View
    {
        return view('admin.item.create');
    }

    public function save(Request $request): RedirectResponse
    {
        Item::validate($request);
        $storeInterface = app(ImageStorage::class);
        $path = $storeInterface->store($request, 'item');
        
        $definitions = $request->only(['title', 'type', 'price', 'guide', 'pieces', 'stock']);
        $definitions['image'] = $path;
        Item::create($definitions);
        $viewData['item'] = $request->all();

        return back()->withSuccess(__('admin.itemCreated'));
    }

    public function delete(int $id): RedirectResponse
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.item.index');
    }
}
