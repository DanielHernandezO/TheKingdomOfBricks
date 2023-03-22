<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::query();

        $requestedId = $request->input('id');
        if ($requestedId != "") {
            $users = User::where('id', '=', $requestedId);
        }

        $viewData = [];
        $viewData['id'] = $requestedId;
        $viewData['users'] = $users->paginate(10);

        return view('admin.user.index')->with('viewData', $viewData);
    }

    public function delete(string $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.user.index');
    }
}
