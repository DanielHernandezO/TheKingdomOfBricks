<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\NukeService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserNukeController extends Controller
{
    public function index(Request $request): View
    {
        $nukeClient = app(NukeService::class);
        $viewData = [];
        $viewData['bombs'] = $nukeClient->getAllBombs();

        return view('user.nuke.index')->with('viewData', $viewData);
    }
}
