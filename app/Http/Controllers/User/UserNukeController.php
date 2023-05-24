<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Interfaces\FlagImageService;
use App\Interfaces\NukeImageService;
use App\Interfaces\NukeService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserNukeController extends Controller
{
    protected NukeService $nukeClient;

    protected FlagImageService $flagImageClient;

    protected NukeImageService $nukeImageClient;

    public function __construct()
    {
        $this->nukeClient = app(NukeService::class);
        $this->flagImageClient = app(FlagImageService::class);
        $this->nukeImageClient = app(NukeImageService::class);
    }

    public function index(Request $request): View
    {
        $bombs = $this->nukeClient->getAllBombs();
        $bombs = array_slice($bombs, 0, 10);

        $bombs = collect($bombs)->map(function ($bomb) {
            $bomb['url'] = $this->nukeImageClient->getNuke($bomb['name']);

            return $bomb;
        });

        $viewData = [];
        $viewData['bombs'] = $bombs;

        return view('user.nuke.index')->with('viewData', $viewData);
    }
}
