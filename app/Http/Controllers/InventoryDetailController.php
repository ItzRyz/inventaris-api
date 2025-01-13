<?php

namespace App\Http\Controllers;

use App\Models\InventoryDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventoryDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invdts = InventoryDetail::with(['inventory', 'product', 'status', 'pj'])->get();
        return response()->json($invdts, 200);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $invdt = InventoryDetail::with(['inventory', 'product', 'status', 'pj'])->findOrFail($id);
        return response()->json($invdt, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'headerid' => 'required|exists:t_inv,id',
            'productid' => 'required|exists:m_product,id',
            'statusid' => 'required|exists:m_status,id',
            'pjid' => 'required|exists:m_pj,id',
            'remark' => 'required|string|max:255',
            'qty' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $invdt = InventoryDetail::create($request->all());
        return response()->json($invdt, 201);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'headerid' => 'required|exists:t_inv,id',
            'productid' => 'required|exists:m_product,id',
            'statusid' => 'required|exists:m_status,id',
            'pjid' => 'required|exists:m_pj,id',
            'remark' => 'required|string|max:255',
            'qty' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $invdt = InventoryDetail::findOrFail($id);
        $invdt->update($request->all());

        return response()->json($invdt, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $invdt = InventoryDetail::findOrFail($id);
        $invdt->delete();
        return response()->json([], 204);
    }
}
