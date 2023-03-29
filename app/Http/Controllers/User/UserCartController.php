<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserCartController extends Controller
{
    public function index(Request $request): View
    {
        $total = 0;
        $itemsInCart = [];
        $itemsInSession = $request->session()->get('items');
        if ($itemsInSession) {
            $itemsInCart = Item::findMany(array_keys($itemsInSession));
            $total = Item::sumPricesByQuantities($itemsInCart, $itemsInSession);
        }
        $viewData = [];
        $viewData['total'] = $total;
        $viewData['items'] = $itemsInCart;

        return view('user.cart.index')->with('viewData', $viewData);
    }

    public function add(Request $request, $id): RedirectResponse
    {
        $items = $request->session()->get('items');
        $items[$id] = $request->input('quantity');
        $request->session()->put('items', $items);

        return redirect()->route('user.cart.index');
    }

    public function delete(Request $request): RedirectResponse
    {
        $request->session()->forget('items');

        return back();
    }

    public function purchase(Request $request): View|RedirectResponse
    {
        $itemsInSession = $request->session()->get('items');
        if ($itemsInSession) {
            $userId = Auth::user()->getId();
            $order = new Order();
            $order->setStatus('PENDING');
            $order->setUserId($userId);
            $order->setTotalAmount(0);
            $order->save();

            $total = 0;
            $itemsInCart = Item::findMany(array_keys($itemsInSession));
            foreach ($itemsInCart as $item) {
                $quantity = $itemsInSession[$item->getId()];
                $orderItem = new OrderItem();
                $orderItem->setQuantity($quantity);
                $orderItem->setPrice($item->getPrice());
                $orderItem->setItemId($item->getId());
                $orderItem->setOrderId($order->getId());
                $orderItem->save();
                $total = $total + ($item->getPrice() * $quantity);
            }
            $order->setTotalAmount($total);
            $userBalance = Auth::user()->getAccountBalance();
            if ($userBalance >= $total) {
		foreach ($itemsInCart as $item){
			$itemModel = Item::findOrFail($item->getId());
			$itemModel->setStock($itemModel->getStock()-$itemsInSession[$item->getId()]);
			$itemModel->save(); 
		}
                $order->setStatus('PAID');
                $newBalance = $userBalance - $total;
                Auth::user()->setAccountBalance($newBalance);
                Auth::User()->save();
                $order->save();
                $request->session()->forget('items');
            }
            $viewData = [];
            $viewData['order'] = $order;
            if ($order->getStatus() == 'PAID') {
                return view('user.cart.success')->with('viewData', $viewData);
            }

            return view('user.cart.fail')->with('viewData', $viewData);
        } else {
            return redirect()->route('user.cart.index');
        }
    }
}
