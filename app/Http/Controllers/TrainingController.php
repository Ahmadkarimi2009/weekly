<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Category;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Traits\CommonFunctions;
use Session;

class TrainingController extends Controller
{
    use CommonFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = Training::all();
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

        $staff = Staff::all();
        $route = route('training.store');
        $method = "POST";
        return view('add_edit_training', compact('route', 'method', 'staff', 'parent_categories', 'child_categories'));
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
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $training = new Training;
        $training->start_date = $request->start_date;
        $training->end_date = $request->end_date;
        $training->title = $request->title;
        $training->details = $request->details;
        $training->participants_list_ids = $request->participants_list_ids;
        $training->location = $request->location;
        $training->trainers = $request->trainers;
        $training->save();


        // Loop through the object of the file inputs group.
        foreach($request->group_inputs as $group) {

            // Check if this file input has files to upload.
            if (isset($group['files']) && count($group['files']) > 0) {

                // Loop through the file for this category.
                foreach ($group['files'] as $file) {

                    // Store the files and return the model to be saved.
                    $file_obj = $this->store_this_file($group, $file);

                    // Save the model using the relationship with conference.
                    $training->file_objects()->save($file_obj);
                }
            }
        }


        Session::flash('message', ["Insertion Successful!", "Training data added Successfully!", "success"]);
        return redirect()->route('training.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        $parent_categories = Category::where('parent', 'yes')->get();
        $child_categories = Category::where('parent', 'no')->get();
        return view('single_training', compact('training', 'parent_categories', 'child_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        //
    }
}
