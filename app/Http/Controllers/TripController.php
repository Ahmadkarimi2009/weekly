<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Staff;
use App\Models\Province;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Traits\CommonFunctions;
use Session;

class TripController extends Controller
{
    use CommonFunctions;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::all();
        return view('trips', compact('trips'));
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
        $staff = Staff::all();
        $route = route('trip.store');
        $method = 'POST';
        return view('add_edit_trip', compact('route', 'method', 'parent_categories', 'child_categories', 'staff', 'provinces'));
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
            'category' => 'required',
            'from_province_id' => 'required',
            'to_province_id' => 'required'
        ]);

        $trip = new Trip;
        $trip->details = $request->details;
        $trip->purpose = $request->purpose;
        $trip->start_date = $request->start_date;
        $trip->end_date = $request->end_date;
        $trip->from_province_id = $request->from_province_id;
        $trip->to_province_id = $request->to_province_id;
        $trip->staff_ids = $request->staff_ids;
        $trip->category = $request->category;
        $trip->save();

        // Loop through the object of the file inputs group.
        foreach($request->group_inputs as $group) {

            // Check if this file input has files to upload.
            if (isset($group['files']) && count($group['files']) > 0) {

                // Loop through the file for this category.
                foreach ($group['files'] as $file) {

                    // Store the files and return the model to be saved.
                    $file_obj = $this->store_this_file($group, $file);

                    // Save the model using the relationship with conference.
                    $trip->file_objects()->save($file_obj);
                }
            }
        }

        Session::flash('message', ["Insertion Successful!", "Trip data inserted successfully!", "success"]);
        return redirect()->route('trip.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        $parent_categories = Category::where('parent', 'yes')->get();
        $child_categories = Category::where('parent', 'no')->get();
        return view('single_trip', compact('trip', 'parent_categories', 'child_categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        
        $parent_categories = Category::where('parent', 'yes')->get();
        $child_categories = Category::where('parent', 'no')->get();
        $provinces = Province::all();
        $staff = Staff::all();
        $route = route('trip.update', $trip);
        $method = 'PUT';
        $old = $trip;
        return view('add_edit_trip', compact('old', 'parent_categories', 'child_categories', 'staff', 'route', 'method', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $trip)
    {
        $trip->details = $request->details;
        $trip->purpose = $request->purpose;
        $trip->start_date = $request->start_date;
        $trip->end_date = $request->end_date;
        $trip->from_province_id = $request->from_province_id;
        $trip->to_province_id = $request->to_province_id;
        $trip->staff_ids = $request->staff_ids;
        $trip->category = $request->category;
        $trip->save();

        // Loop through the object of the file inputs group.
        foreach($request->group_inputs as $group) {

            // Check if this file input has files to upload.
            if (isset($group['files']) && count($group['files']) > 0) {

                // Loop through the file for this category.
                foreach ($group['files'] as $file) {

                    // Store the files and return the model to be saved.
                    $file_obj = $this->store_this_file($group, $file);

                    // Save the model using the relationship with conference.
                    $trip->file_objects()->save($file_obj);
                }
            }
        }

        Session::flash('message', ["Update Successful!", "Trip data updated successfully!", "success"]);
        return redirect()->route('trip.show', $trip);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();
        Session::flash('message', ["Insertion Successful!", "Trip deleted successfully!", "success"]);
        return redirect()->route('trip.index');
    }
}
