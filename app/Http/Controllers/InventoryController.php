<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use App\Models\InventoryDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inventories = Inventory::with(['category', 'createdby'])->get();
        return response()->json($inventories, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $inventory = Inventory::with(['category', 'createdby'])->findOrFail($id);
        return response()->json($inventory, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'transcode' => 'required|string|max:255',
            'transdate' => 'required|date',
            'remark' => 'required|string|max:255',
            'categoryid' => 'required|exists:m_category,id',
            'createdby' => 'required|exists:m_user,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $inventory = Inventory::create($request->all());
        return response()->json($inventory, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'transcode' => 'required|string|max:255',
            'transdate' => 'required|date',
            'remark' => 'required|string|max:255',
            'categoryid' => 'required|exists:m_category,id',
            'createdby' => 'required|exists:m_user,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $inventory = Inventory::findOrFail($id);
        $inventory->update($request->all());

        return response()->json($inventory, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        InventoryDetail::where('headerid', $id)->delete();
        $inventory->delete();
        return response()->json([], 204);
    }
}
