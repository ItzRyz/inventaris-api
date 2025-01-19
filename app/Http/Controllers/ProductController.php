<?php

namespace App\Http\Controllers;

use App\Models\InventoryDetail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::with(['category'])->get();
        return response()->json($products,200);
    }
 
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $product = Product::with(['category'])->findOrFail($id);
        return response()->json($product, 200);
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'categoryid' => 'required|exists:m_category,id',
            'deskripsi' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $product = Product::create($request->all());
        return response()->json($product, 201);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'categoryid' => 'required|exists:m_category,id',
            'deskripsi' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json($product, 200);
    }
 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (InventoryDetail::where('productid', $id)->exists()) {
            return response()->json([
                'message' => 'Product cannot be deleted as it is still associated with other data.'
            ], 400);
        }

        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json([], 204);
    }
}
