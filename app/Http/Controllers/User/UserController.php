<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function profile(Request $request): View
    {
        $userId = auth()->user()->getId();
        $user = User::with('character.items')->find($userId);

        $viewData = [];
        $viewData['user'] = $user;
        $viewData['characterName'] = $user->getCharacter()->getName();

        $viewData['head'] = $user->getCharacter()->getHead();
        $viewData['chest'] = $user->getCharacter()->getChest();
        $viewData['legs'] = $user->getCharacter()->getLegs();
        $viewData['totalPrice'] = $user->getCharacter()->getTotalPrice();

        return view('user.profile')->with('viewData', $viewData);
    }
}
