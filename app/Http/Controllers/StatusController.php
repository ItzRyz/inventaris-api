<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $status = Status::with(['category'])->get();
        return response()->json($status,200); 
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $status = Status::with(['category'])->findOrFail($id);
        return response()->json($status, 200);    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'categoryid' => 'required|exists:m_category,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $status = Status::create($request->all());
        return response()->json($status, 201);
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'categoryid' => 'required|exists:m_category,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $status = Status::findOrFail($id);
        $status->update($request->all());

        return response()->json($status, 200);
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = Status::findOrFail($id);
        $id->delete();
        return response()->json([], 204);
    }
}
