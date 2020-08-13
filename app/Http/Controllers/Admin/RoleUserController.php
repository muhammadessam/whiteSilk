<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class RoleUserController extends Controller
{
    public function store(Request $request, User $user)
    {
        $user->roles()->sync($request['roles']);
        $this->actionsuccess();
        return redirect()->back();
    }
}
