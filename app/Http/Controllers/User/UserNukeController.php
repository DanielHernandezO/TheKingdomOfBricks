<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserNukeController extends Controller
{
    public function index(Request $request): View
    {   
        $url = 'https://www.nukestore.world/api/bombs';
        $response = Http::get($url);
        $viewData = [];
        $viewData['bombs'] = $response->json();
        return view('user.nuke.index')->with('viewData', $viewData);
    }
}
