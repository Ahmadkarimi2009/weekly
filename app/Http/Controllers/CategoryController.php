<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('technicals.categories', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent', null)->get();
        $method = "POST";
        $route = route('categories.store');
        return view('technicals.new_category', compact('categories', 'method', 'route'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|unique:categories',
        ]);

        $category = new Category;
        $category->name = $request->name;
        if(isset($request->parent)) {
            $category->parent = $request->parent;
        }

        $category->save();
        Session::flash('message', ["Insertion Successful!", "Category Inserted Successfully!", "success"]);
        return redirect()->route('categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::where('parent', null)->get();
        $method = "PUT";
        $route = route('categories.update', $category);
        $old = $category;
        return view('technicals.new_category', compact('categories', 'method', 'route', 'old'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required',
        ]);

        $category->name = $request->name;
        if(isset($request->parent)) {
            $category->parent = $request->parent;
        }
        else {
            $category->parent = null;
        }

        $category->save();
        Session::flash('message', ["Update Successful!", "Category Updated Successfully!", "success"]);
        return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->where('parent', $category->id)->delete();
        $category->delete();
        Session::flash('message', ["Deletion Successful!", "Category Deleted Successfully!", "success"]);
        return redirect()->route('categories.index');
    }
}
