<?php

namespace App\Http\Controllers\Admin;

use App\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->canAccess('show', Branch::class);
        return view('admin.branches.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->canAccess('create', Branch::class);
        return view('admin.branches.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->canAccess('create', Branch::class);
        $request->validate([
            'name' => 'required',
            'bill_prefix' => 'required',
        ]);
        $request['is_app'] = $request['is_app'] ? 1 : 0;
        Branch::create($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.branches.index');
    }

    /**
     * Display the specified resource.
     *
     * @param Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function show(Branch $branch)
    {
        $this->canAccess('show', Branch::class);
        return view('admin.branches.show', compact('branch'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function edit(Branch $branch)
    {
        $this->canAccess('edit', Branch::class);
        return view('admin.branches.edit', compact('branch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Branch $branch)
    {
        $this->canAccess('edit', Branch::class);
        $request->validate([
            'name' => 'required',
            'bill_prefix' => 'required',
        ]);
        $request['is_app'] = $request['is_app'] ? 1 : 0;
        $branch->update($request->all());
        $this->actionSuccess();
        return redirect()->route('admin.branches.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Branch $branch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Branch $branch)
    {
        $this->canAccess('delete', Branch::class);
        $branch->delete();
        $this->actionSuccess();
        return back();
    }

    public function massDestroy(Request $request)
    {
        $this->canAccess('delete', Branch::class);
        Branch::whereIn('id', $request['ids'])->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
