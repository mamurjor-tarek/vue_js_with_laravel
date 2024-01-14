<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return response()->json($categories,200);
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
            'name'=>['required','unique:categories,name'],
        ]);
        Category::create([
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
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        if($category){
            return response()->json($category,200);
        }else {
            return response()->json('failed',404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'=>['required','unique:categories,name,'.$category->id],
        ]);
        $category = $category->update([
            'name'=> $request->name,
            'slug'=>Str::slug($request->name),
        ]);

        return response()->json($category,200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if ($category) {
            $category->delete();
            return response()->json('success',200);
        } else {
            return response()->json('failed',404);
        }
        
        
    }
}
