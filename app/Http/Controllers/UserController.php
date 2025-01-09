<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreMUserRequest;
use App\Http\Requests\UpdateMUserRequest;

class UserController extends Controller
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
    public function show(User $mUser)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMUserRequest $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMUserRequest $request, User $mUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $mUser)
    {
        //
    }
}
