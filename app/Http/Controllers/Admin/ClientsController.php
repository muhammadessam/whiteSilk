<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.clients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.clients.create');
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
        $request['type'] = 'عميل';
        User::create($request->all());
        $this->actionsuccess();
        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Driver $client
     * @return \Illuminate\Http\Response
     */
    public function show(User $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Driver $client
     * @return \Illuminate\Http\Response
     */
    public function edit(User $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Driver $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $client)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($request->hasFile('img_temp')) {
            if ($client['img']) {
                File::delete($client['img']);
            }
            $request['img'] = 'storage/' . $request->file('img_temp')->store('UserProfiles', 'public');
        }

        $client->update($request->all());
        $this->actionsuccess();
        return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Driver $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $client)
    {
        $client->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(Request $request)
    {
        User::whereIn('id', $request['ids'])->delete();
        return response(null, Response::HTTP_NO_CONTENT);

    }
}
