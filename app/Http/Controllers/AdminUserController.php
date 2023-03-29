<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminUserController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::where('role', '=', 'user');

        $requestedId = $request->input('id');
        if ($requestedId != '') {
            $users = $users->where('id', '=', $requestedId);
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
