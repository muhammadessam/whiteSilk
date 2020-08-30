<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Client::all();
        if ($request['is_subscribed'] === '1') {
            $data = $data->filter(function ($client) {
                return $client->subscriptions()->exists();
            });
        }
        if ($request['is_subscribed'] === '0') {
            $data = $data->filter(function ($client) {
                return !($client->subscriptions()->exists());
            });
        }
        return view('admin.clients.index', ['data' => $data]);
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
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|confirmed|min:6',
            'phone' => 'required|numeric',
        ]);
        $this->storeImg($request, 'img_temp', 'UserProfiles');
        Client::create($request->all());
        $this->actionsuccess();
        return redirect()->route('admin.clients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Client $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('admin.clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Client $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param \App\Driver $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
        ]);

        if ($request->hasFile('img_temp')) {
            if ($client['img']) {
                File::delete($client['img']);
            }
            $this->storeImg($request, 'img_temp', 'UserProfiles');
        }

        $client->update($request->all());
        $this->actionsuccess();
        return redirect()->route('admin.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Client $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(Request $request)
    {
        Client::whereIn('id', $request['ids'])->delete();
        return response(null, Response::HTTP_NO_CONTENT);

    }
}
