<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', User::class);
        return view('admin.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(auth()->user()->cannot(app('roleHelper')->crudsToName('create'), User::class), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort_if(auth()->user()->cannot(app('roleHelper')->crudsToName('create'), User::class), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed|min:6',
        ]);
        if ($request->hasFile('img_temp'))
            $request['img'] = 'storage/' . $request->file('img_temp')->store('UserProfiles', 'public');
        User::create($request->all());
        $this->actionsuccess();
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        abort_if(auth()->user()->cannot(app('roleHelper')->crudsToName('show'), User::class), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function edit(User $user)
    {
        abort_if(auth()->user()->cannot(app('roleHelper')->crudsToName('edit'), User::class), Response::HTTP_FORBIDDEN, '403 Forbidden');
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param User $user
     * @return void
     */
    public function update(Request $request, User $user)
    {
        abort_if(auth()->user()->cannot(app('roleHelper')->crudsToName('edit'), User::class), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($request->hasFile('img_temp')) {
            if ($user['img']) {
                File::delete($user['img']);
            }
            $request['img'] = 'storage/' . $request->file('img_temp')->store('UserProfiles', 'public');
        }

        $user->update($request->all());
        $this->actionsuccess();
        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return void
     */
    public function destroy(User $user)
    {
        abort_if(auth()->user()->cannot(app('roleHelper')->crudsToName('delete'), User::class), Response::HTTP_FORBIDDEN, '403 Forbidden');
        if ($user['img'])
            File::delete($user['img']);
        $user->delete();
        $this->actionsuccess();
        return redirect()->back();
    }
}
