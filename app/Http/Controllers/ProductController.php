<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return response()->json($products,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>['required','unique:products,title'],
        ]);
        Product::create([
            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
        ]);
        return response()->json([
            'success'=>200
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $Product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $Product)
    {
        if($Product){
            return response()->json($Product,200);
        }else {
            return response()->json('failed',404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $Product)
    {
        $request->validate([
            'name'=>['required','unique:products,name,'.$Product->id],
        ]);
        $Product = $Product->update([
            'name'=> $request->name,
            'slug'=>Str::slug($request->name),
        ]);

        return response()->json($Product,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $Product)
    {
        if ($Product) {
            $Product->delete();
            return response()->json('success',200);
        } else {
            return response()->json('failed',404);
        }
        
        
    }
}
