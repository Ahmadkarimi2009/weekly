<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Category;
use App\Models\Province;
use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Traits\CommonFunctions;
use Session;
use File;

class ImageController extends Controller
{
    use CommonFunctions;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        $images = Image::all();
        $reports = Report::where('images', '<>', null)->get();
        $years = $this->get_list_of_years();
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'September', 'October', 'November', 'December'];

        return view('images', compact('reports', 'provinces', 'years', 'months', 'images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $image_parent_category = Category::where('name', 'images')->first();
        $categories = Category::where('parent', $image_parent_category->id)->get();
        $provinces = Province::all();

        $route = route('image.store');
        $method = "POST";
        return view('add_edit_image', compact('categories', 'route', 'method', 'provinces'));
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
            'category' => 'required',
            'images' => 'required',
        ]);

        foreach($request->file('images') as $index => $image) {
            $save_image = new Image;
            $name = microtime(true) . '_' . rand(100000000, 9999999999) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('images', $name);

            $save_image->category_id = $request->category;
            $save_image->province_id = $request->province;
            if (isset($request->year)) {
                $save_image->year = $request->year;
            }

            if (isset($request->province)) {
                $save_image->province_id = $request->province;
            }
            $save_image->path = $path;
            $save_image->save();
        }

        Session::flash('message', ["Insertion Successful!", "Image(s) Uploaded Successfully!", "success"]);
        return redirect()->route('images.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(Image $image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        $image->delete();
        Session::flash('message', ['Deletion Successful!', 'Image Deleted Successfully!', 'success']);
        return redirect()->route('image.index');
    }
}
