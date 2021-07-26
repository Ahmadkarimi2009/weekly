<?php

namespace App\Http\Controllers;

use App\Models\Training;
use App\Models\Category;
use App\Models\Staff;
use Illuminate\Http\Request;
use Session;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trainings = Training::find(1);

        dd($trainings->participants_list_ids);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $training_parent_category = Category::where('name', 'files')->first();
        $training_category_id = Category::where('parent', $training_parent_category->id)
        ->where('name', 'training')->first()->id;

        $staff = Staff::all();
        $route = route('training.store');
        $method = "POST";
        return view('add_edit_training', compact('route', 'method', 'staff', 'training_category_id'));
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
        //
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
