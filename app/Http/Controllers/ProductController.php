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
            'title'=>['required','unique:products,title'],
            'price'=>['required'],
            // 'image'=>['required','image'],
            'description'=>['required'],
        ]);
        if ($request->image != null) {
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $imageExt = $image->getClientOriginalExtension();
            $imageUniuqe = md5(rand().time().$imageName).'.'.$imageExt;
            $image->move(public_path('uploads/images/products/'),$imageUniuqe);
        }
        Product::create([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'price'       => $request->price,
            'image'       => 'uploads/images/products/'.$imageUniuqe,
            'description' => $request->description,
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
            'title'=>['required','unique:products,title,'.$Product->id],
            'price'=>['required'],
            // 'image'=>['required','image'],
            'description'=>['required'],
        ]);
        if ($request->image) {
            if ($Product->image != null) {
                file_exists(public_path($Product->image)) ? unlink(public_path($Product->image)) : false;
            }
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $imageExt = $image->getClientOriginalExtension();
            $imageUniuqe = md5(rand().time().$imageName).'.'.$imageExt;
            $image->move(public_path('uploads/images/products/'),$imageUniuqe);
            
            $imageUniuqe = 'uploads/images/products/'.$imageUniuqe;
        }else{
            $imageUniuqe = $Product->image;
        }

        $Product->update([
            'title'       => $request->title,
            'slug'        => Str::slug($request->title),
            'price'       => $request->price,
            'image'       => $imageUniuqe,
            'description' => $request->description,
        ]);

        return response()->json($Product,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $Product)
    {
        if ($Product) {
            if ($Product->image != null) {
                file_exists(public_path($Product->image)) ? unlink(public_path($Product->image)) : false;
            }
            $Product->delete();
            return response()->json('success',200);
        } else {
            return response()->json('failed',404);
        }
        
        
    }
}
