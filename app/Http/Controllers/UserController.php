<?php

namespace App\Http\Controllers;
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
     
        return view('user.profile')->with('viewData', $viewData);
    }

}
