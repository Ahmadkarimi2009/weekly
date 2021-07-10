<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Session;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $staff = Staff::all();
        return view('staff', compact('staff'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = route('staff.store');
        $method = 'POST';

        return view('add_edit_staff', compact('route', 'method'));
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
            'name' => 'required',
            'ipso_id' => 'required',
            'position' => 'required',
        ]);

        $staff = new Staff;
        $staff->name = $request->name;
        $staff->father_name = $request->father_name;
        $staff->ipso_id = $request->ipso_id;
        $staff->position = $request->position;
        $staff->province = $request->province;
        $staff->district = $request->district;
        $staff->date_of_employment = $request->date_of_employment;
        $staff->gender = $request->gender;
        $staff->job_description = $request->job_description;
        $staff->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $name = $request->name . ' ' . microtime(true) . '.' . $request->image->getClientOriginalExtension();
            $path = $image->storeAs('staff_image', $name);
            $staff->image = $path;
        }

        $staff->save();
        Session::flash('message', ["Insertion Successful!", "Staff added Successfully!", "success"]);
        return redirect()->route('staff.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
    {
        $route = route('staff.update', $staff);
        $method = 'PUT';
        $old = $staff;

        return view('add_edit_staff', compact('route', 'method', 'old'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Staff $staff)
    {
        $staff->name = $request->name;
        $staff->father_name = $request->father_name;
        $staff->ipso_id = $request->ipso_id;
        $staff->position = $request->position;
        $staff->province = $request->province;
        $staff->district = $request->district;
        $staff->date_of_employment = $request->date_of_employment;
        $staff->gender = $request->gender;
        $staff->job_description = $request->job_description;
        $staff->category_id = $request->category_id;

        if ($request->hasFile('image')) {
            $new_file_extension = $request->file('image')->getClientOriginalExtension();
            $name = $request->name . ' ' . microtime(true) . '.' . $new_file_extension;
            $path = $request->image->storeAs('staff_image', $name);
            $staff->image = $path;
        }

        $staff->save();
        Session::flash('message', ["Update Successful!", "Staff data updated Successfully!", "success"]);
        return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Staff  $staff
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
        Session::flash('message', ["Deletion Successful!", "Staff data deleted Successfully!", "success"]);
        return redirect()->route('staff.index');
    }
}
