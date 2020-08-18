<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.drivers.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.drivers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed|min:6',
        ]);
        if ($request->hasFile('img_temp'))
            $request['img'] = 'storage/' . $request->file('img_temp')->store('UserProfiles', 'public');
        $request['type'] = 'سائق';
        User::create($request->all());
        $this->actionsuccess();
        return redirect()->route('admin.drivers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Driver $driver
     * @return \Illuminate\Http\Response
     */
    public function show(User $driver)
    {
        return view('admin.drivers.show', compact('driver'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Driver $driver
     * @return \Illuminate\Http\Response
     */
    public function edit(User $driver)
    {
        return view('admin.drivers.edit', compact('driver'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Driver $driver
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $driver)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($request->hasFile('img_temp')) {
            if ($driver['img']) {
                File::delete($driver['img']);
            }
            $request['img'] = 'storage/' . $request->file('img_temp')->store('UserProfiles', 'public');
        }

        $driver->update($request->all());
        $this->actionsuccess();
        return redirect()->route('admin.drivers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Driver $driver
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $driver)
    {
        $driver->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(Request $request)
    {
        User::whereIn('id', $request['ids'])->delete();
        return response(null, Response::HTTP_NO_CONTENT);

    }
}
