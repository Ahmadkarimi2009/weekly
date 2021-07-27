<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\Province;
use App\Models\File;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\CommonFunctions;
use Session;

class ConferenceController extends Controller
{
    use CommonFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conferences = Conference::all();
        $provinces = Province::all();
        return view('conferences', compact('conferences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_categories = Category::where('parent', 'yes')->get();
        $child_categories = Category::where('parent', 'no')->get();

        $provinces = Province::all();
        $route = route('conferences.store');
        $method = 'POST';
        return view('add_edit_conference', compact('route', 'method', 'provinces', 'parent_categories', 'child_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'province' => 'required',
            'date' => 'required'
        ]);

        if (!empty($request->images)) {
            $images = json_encode($this->store_images($request));
        }

        $conf = new Conference;
        $conf->province = $request->province;
        $conf->title = $request->title;
        $conf->date = $request->date;
        $conf->avenue = $request->avenue;
        $conf->details = $request->details;
        $conf->save();

        // Loop through the object of the file inputs group.
        foreach($request->group_inputs as $group) {

            // Check if this file input has files to upload.
            if (isset($group['files']) && count($group['files']) > 0) {

                // Loop through the file for this category.
                foreach ($group['files'] as $file) {

                    // Store the files and return the model to be saved.
                    $file_obj = $this->store_this_file($group, $file);

                    // Save the model using the relationship with conference.
                    $conf->file_objects()->save($file_obj);
                }
            }
        }

        Session::flash('message', ["Insertion Successful!", "Conference data inserted successfully!", "success"]);
        return redirect()->route('conferences.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $conference = Conference::find($id);
        $parent_categories = Category::where('parent', 'yes')->get();
        $child_categories = Category::where('parent', 'no')->get();
        // dd($conference);
        return view('single_conference', compact('conference', 'parent_categories', 'child_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function edit(Conference $conference)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Conference $conference)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Conference  $conference
     * @return \Illuminate\Http\Response
     */
    public function destroy(Conference $conference)
    {
        //
    }
}
