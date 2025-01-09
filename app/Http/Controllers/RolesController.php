<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Http\Requests\StoreRolesRequest;
use App\Http\Requests\UpdateRolesRequest;

class RolesController extends Controller
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
    public function show(Roles $roles)
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRolesRequest $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRolesRequest $request, Roles $roles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Roles $roles)
    {
        //
    }
}
