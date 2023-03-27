<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CharacterController extends Controller
{   
    public function editView(Request $request): View
    {   
        $userId = auth()->user()->getId();
        $character = Character::where('user_id', $userId)->with('items')->first();
        $viewData = [];
        $viewData['character'] = $character;
        return view('character.editView');
    }

    public function update(Request $request): void
    {   
        $userId = auth()->user()->getId();
        $character = Character::where('user_id', $userId)->first();
        $character->setName($request->name);
        $character->setHead($request->head);
        $character->setChest($request->chest);
        $character->setLegs($request->legs);

        return redirect()->route('user.profile');
    }
}
