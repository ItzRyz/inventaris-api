<?php

namespace App\Http\Controllers;

use App\Models\PJ;
use App\Http\Requests\StorePJRequest;
use App\Http\Requests\UpdatePJRequest;

class PJController extends Controller
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
    public function show(PJ $pJ)
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePJRequest $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePJRequest $request, PJ $pJ)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PJ $pJ)
    {
        //
    }
}
