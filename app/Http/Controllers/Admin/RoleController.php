<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Silber\Bouncer\Database\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.roles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        Role::create(['name' => $request['name']]);
        $this->actionsuccess();
        return redirect()->route('admin.roles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Role $role
     * @return void
     */
    public function show(Role $role)
    {
        return view('admin.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Role $role
     * @return void
     */
    public function edit(Role $role)
    {
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Role $role
     * @return void
     */
    public function update(Request $request, Role $role)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $role->update($request->all());
        $this->actionsuccess();
        return redirect()->route('admin.roles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Role $role
     * @return void
     */
    public function destroy(Role $role)
    {
        $role->delete();
        $this->actionsuccess();
        return redirect()->back();
    }

    public function massDestroy(Request $request)
    {
        Role::whereIn('id', $request['ids'])->delete();

    }
}
