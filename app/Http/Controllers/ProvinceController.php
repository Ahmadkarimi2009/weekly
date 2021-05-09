<?php

namespace App\Http\Controllers;

use App\Models\province;
use Illuminate\Http\Request;
use Session;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = province::all();
        return view('provinces', compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = route('province.store');
        $method = 'POST';
        return view('add_edit_province', compact('route', 'method'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $province = new province;
        $province->name = $request->name;
        $province->save();

        Session::flash('message', ['Insertion Successful!', 'Province Store Successfully!', 'success']);
        return redirect()->route('province.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\province  $province
     * @return \Illuminate\Http\Response
     */
    public function show(province $province)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\province  $province
     * @return \Illuminate\Http\Response
     */
    public function edit(province $province)
    {
        $route = route('province.update', $province->id);
        $method = 'PUT';
        $old = $province;
        return view('add_edit_province', compact('route', 'method', 'old'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\province  $province
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, province $province)
    {
        $province->name = $request->name;
        $province->save();
        Session::flash('message', ['Update Successful!', 'Province Updated Successfully!', 'success']);
        return redirect()->route('province.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\province  $province
     * @return \Illuminate\Http\Response
     */
    public function destroy(province $province)
    {
        $province->delete();
        Session::flash('message', ["Deletion Successful!", "Province Deleted Successfully!", "success"]);
        return redirect()->route('province.index');
    }
}
