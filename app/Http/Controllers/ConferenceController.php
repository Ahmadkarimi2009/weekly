<?php

namespace App\Http\Controllers;

use App\Models\Conference;
use App\Models\Province;
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
        $image_parent_category = Category::where('name', 'images')->first();
        $conference_image_category_id = Category::where('parent', $image_parent_category->id)
        ->where('name', 'conference')->first()->id;

        $provinces = Province::all();
        $route = route('conference.store');
        $method = 'POST';
        return view('add_edit_conference', compact('route', 'method', 'provinces', 'conference_image_category_id'));
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

        $request->validate([
            'category' => 'required',
            'province' => 'required',
            'date' => 'required'
        ]);

        $images = [];
        if (!empty($request->images)) {
            $images = json_encode($this->store_images($request));
        }

        $conf = new Conference;
        $conf->province = $request->province;
        $conf->title = $request->title;
        $conf->date = $request->date;
        $conf->avenue = $request->avenue;
        $conf->details = $request->details;
        $conf->images = $images;
        $conf->save();

        Session::flash('message', ["Insertion Successful!", "Conference data inserted successfully!", "success"]);
        return redirect()->route('conference.index');
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
        return view('single_conference', compact('conference'));
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
        //
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
