<?php

namespace App\Http\Controllers;

use App\Models\MenuAccess;
use App\Http\Requests\StoreMenuAccessRequest;
use App\Http\Requests\UpdateMenuAccessRequest;

class MenuAccessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }
    /**
     * Display the specified resource.
     */
    public function show(MenuAccess $menuAccess)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMenuAccessRequest $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMenuAccessRequest $request, MenuAccess $menuAccess)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MenuAccess $menuAccess)
    {
        //
    }
}
