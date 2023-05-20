<?php

namespace App\Http\Controllers\Panel;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;

class UserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('users.index')->with([
            'users' => User::all(),
        ]);
    }

    /**
     * 
     * @param \App\Models\User $user
     */
    public function toggleAdmin(User $user)
    {
        if ($user->isAdmin()) {
            $user->admin_since = null;
        } else {
            $user->admin_since = now();
        }

        $user->save();

        return redirect()
            ->route('users.index')
            ->withSuccess("Admin stutus for user {$user->id} was toggled.");
    }
}
