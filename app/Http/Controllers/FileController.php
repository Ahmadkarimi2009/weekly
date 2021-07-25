<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Category;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Traits\CommonFunctions;
use Session;

class FileController extends Controller
{
    use CommonFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        return view('files', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files_parent_category = Category::where('name', 'files')->first();
        $categories = Category::where('parent', $files_parent_category->id)->get();
        $provinces = Province::all();

        $route = route('file.store');
        $method = "POST";
        return view('add_edit_files', compact('categories', 'route', 'method', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'category' => 'required',
            'files' => 'required',
        ]);
        $this->store_files($request);
        Session::flash('message', ["Insertion Successful!", "File(s) Uploaded Successfully!", "success"]);
        return redirect()->route('file.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        $old = $file;
        $files_parent_category = Category::where('name', 'files')->first();
        $categories = Category::where('parent', $files_parent_category->id)->get();
        $provinces = Province::all();

        $route = route('file.update', $file);
        $method = "PUT";
        return view('add_edit_files', compact('categories', 'route', 'method', 'provinces', 'old'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();
        Session::flash('message', ["Deletion Successful!", "File(s) Deleted Successfully!", "success"]);
        return redirect()->route('file.index');
    }
}
