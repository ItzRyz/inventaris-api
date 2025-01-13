<?php

namespace App\Http\Controllers;

use App\Models\PJ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PJController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pj = PJ::all();
        return response()->json($pj, 200);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pj = PJ::findOrFail($id);
        return response()->json($pj, 200);
    
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'kode' => 'required|unique:m_pj,kode',
            'lokasi'=> 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $pj = PJ::create($request->all());
        return response()->json($pj, 201);
    
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        
        $validator = Validator::make($request->all(), [
            'kode' => 'required|unique:m_pj,kode,' . $id,
            'nama' => 'required|string|max:255',
            'lokasi'=> 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $category = PJ::findOrFail($id);
        $category->update($request->all());

        return response()->json($category, 200);
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pj = PJ::findOrFail($id);
        $pj->delete();
        return response()->json([], 204);
    }
}
