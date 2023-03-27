<?php

namespace App\Http\Controllers;

use App\Models\Character;
use App\Models\User;
use Illuminate\Http\Request;

class CharacterController extends Controller
{
    public function update(Request $request): void
    {
        $character = Character::findOrFail($request->id);
        $character->setName($request->name);
        $character->setHead($request->head);
        $character->setChest($request->chest);
        $character->setLegs($request->legs);

        //TODO REDIRECT TO MY PROFILE
        return redirect()->route('PLACEHOLDER');
    }

    public function delete(string $id): void
    {
        $character = Character::findOrFail($id);
        $character->delete();

        //TODO ASSIGN BASE CHARACTER TO USER
        //TODO REDIRECT TO MY PROFILE
        return redirect()->route('PLACEHOLDER');
    }
}
