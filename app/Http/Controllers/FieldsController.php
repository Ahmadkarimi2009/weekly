<?php

namespace App\Http\Controllers;

use App\Models\Fields;
use Illuminate\Http\Request;
use Session;

class FieldsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fields = Fields::all();
        return view('fields', compact('fields'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = route('field.store');
        $method = 'POST';
        return view('add_edit_fields', compact('route', 'method'));
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
            'data_type' => 'required',
            'searchable' => 'required',
            'machine_name' => 'required'
        ]);

        $field = new Fields;
        $field->name = $request->name;
        $field->machine_name = $request->machine_name;
        $field->data_type = $request->data_type;
        $field->searchable = $request->searchable;
        $field->save();

        Session::flash('message', ['Insertion Successful!', 'Field Stored Successfully!', 'success']);
        return redirect()->route('field.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Fields  $fields
     * @return \Illuminate\Http\Response
     */
    public function show(Fields $fields)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fields  $fields
     * @return \Illuminate\Http\Response
     */
    public function edit(Fields $field)
    {
        $route = route('field.update', $field->id);
        $method = 'PUT';
        $old = $field;
        return view('add_edit_fields', compact('route', 'method', 'old'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Fields  $fields
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fields $field)
    {
        $validated = $request->validate([
            'name' => 'required',
            'data_type' => 'required',
            'searchable' => 'required',
            'machine_name' => 'required'
        ]);

        $field->name = $request->name;
        $field->machine_name = $request->machine_name;
        $field->data_type = $request->data_type;
        $field->searchable = $request->searchable;
        $field->save();

        Session::flash('message', ['Update Successful!', 'Field Updated Successfully!', 'success']);
        return redirect()->route('field.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Fields  $fields
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fields $field)
    {
        $field->delete();
        Session::flash('message', ['Deletion Successful!', 'Field Deleted Successfully!', 'success']);
        return redirect()->route('field.index');
    }
}
