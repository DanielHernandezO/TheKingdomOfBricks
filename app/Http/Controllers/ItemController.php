<?php

namespace App\Http\Controllers;

use App\Interfaces\ImageStorage;
use App\Models\Item;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemController extends Controller
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

        return view('admin.item.index')->with('viewData', $viewData);
    }

    public function show(string $id): View|RedirectResponse
    {
        try {
            $viewData = [];
            $item = Item::findOrFail($id);
            $viewData['item'] = $item;

            return view('admin.item.show')->with('viewData', $viewData);
        } catch (Exception $e) {
            return redirect()->route('admin.index');
        }
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

    public function update(Request $request): RedirectResponse
    {
        $itemId = $request['id'];
        $item = Item::findOrFail($itemId);
        if ($item) {
            $item->setStock($item->getStock() + $request['stock']);
            $item->save();
        }

        return back()->withSuccess(__('admin.addedStock'));
    }

    public function delete(int $id): RedirectResponse
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.item.index');
    }
}
