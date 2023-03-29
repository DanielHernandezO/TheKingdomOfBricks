<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class UserMyPurchasesController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['purchases'] = Order::where('user_id', Auth::user()->getId())->paginate(5);

        return view('user.purchase.index')->with('viewData', $viewData);
    }
}
