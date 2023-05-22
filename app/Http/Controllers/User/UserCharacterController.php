<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Item;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserCharacterController extends Controller
{
    public function editView(): View
    {
        $userId = auth()->user()->getId();
        $character = Character::where('user_id', $userId)->with('items')->first();
        $heads = Item::where('type', 'head')->get();
        $chests = Item::where('type', 'chest')->get();
        $legs = Item::where('type', 'legs')->get();

        $viewData = [];
        $viewData['characterName'] = $character->getName();

        $viewData['heads'] = $heads;
        $viewData['chests'] = $chests;
        $viewData['legs'] = $legs;

        $viewData['totalPrice'] = $character->getTotalPrice();

        return view('user.character.editView')->with('viewData', $viewData);
    }

    public function update(Request $request): RedirectResponse
    {
        $user = auth()->user();
        $character = new Character();

        $head = Item::findOrFail($request['head-id']);
        $chest = Item::findOrFail($request['chest-id']);
        $legs = Item::findOrFail($request['legs-id']);

        $character->setName($request['name']);
        $user->getCharacter()->delete();
        $user->character()->save($character);
        $character->setHead($head);
        $character->setChest($chest);
        $character->setLegs($legs);

        return redirect()->route('user.profile');
    }
}
