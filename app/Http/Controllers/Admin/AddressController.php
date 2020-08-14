<?php

namespace App\Http\Controllers\Admin;

use App\Address;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAddressRequest;
use App\Http\Requests\StoreAddressRequest;
use App\Http\Requests\UpdateAddressRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class AddressController extends Controller
{
    public function index(Request $request)
    {
        $this->canAccess('show', Address::class);
        return view('admin.addresses.index');
    }

    public function create()
    {

        $this->canAccess('create', Address::class);
        return view('admin.addresses.create');
    }

    public function store(Request $request)
    {
        $this->canAccess('create', Address::class);
        $address = Address::create($request->all());

        return redirect()->route('admin.addresses.index');
    }

    public function edit(Address $address)
    {
        $this->canAccess('edit', Address::class);
        return view('admin.addresses.edit', compact('address'));
    }

    public function update(Request $request, Address $address)
    {
        $request->validate([
            'customer_id' => ['required', 'integer',],
            'country_id' => ['required', 'integer',],
            'city_id' => ['required', 'integer',],
            'lat' => ['numeric',],
            'long' => ['numeric',],
            'phone' => ['string', 'nullable',],
            'alter_phone' => ['string', 'nullable',],
            'name' => ['string', 'nullable',],
            'block' => ['string', 'nullable',],
            'gada' => ['string', 'nullable',],
            'street' => ['string', 'nullable',],
            'building' => ['string', 'nullable',],
            'floor' => ['string', 'nullable',],
            'flat_house' => ['string', 'nullable',]
        ]);
        $address->update($request->all());

        return redirect()->route('admin.addresses.index');
    }

    public function show(Address $address)
    {
        $this->canAccess('show', Address::class);
        return view('admin.addresses.show', compact('address'));
    }

    public function destroy(Address $address)
    {
        $this->canAccess('delete', Address::class);
        $address->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(MassDestroyAddressRequest $request)
    {
        Address::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
