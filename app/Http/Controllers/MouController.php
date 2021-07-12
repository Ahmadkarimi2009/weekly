<?php

namespace App\Http\Controllers;

use App\Models\Mou;
use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Traits\CommonFunctions;
use Session;

class MouController extends Controller
{
    use CommonFunctions;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mous = Mou::all();
        return view('mous', compact('mous'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $route = route('mou.store');
        $method = 'POST';
        $years = $this->get_list_of_years();
        $provinces = Province::all();
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        return view('add_edit_mou', compact('route', 'method', 'years', 'months', 'provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate(
            [
                'province' => 'required',
                'file' => 'required|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'year' => 'required',
                'month' => 'required',
            ],
            [
                'file.mimetypes' => 'Your file type should be either PDF, DOC or DOCX.',
            ]
        );

        $mou = new Mou;
        $mou->province = $request->province;
        $mou->year = $request->year;
        $mou->month = $request->month;

        if ($request->hasFile('file')) {
            $name = $request->province . '_' . $request->year . microtime(true) . '.' . $request->file->getClientOriginalExtension();
            $path = $request->file->storeAs('mous', $name);
            $mou->file = $path;
        }

        $mou->save();
        Session::flash('message', ["Insertion Successful!", "MoU added Successfully!", "success"]);
        return redirect()->route('mou.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function show(Mou $mou)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function edit(Mou $mou)
    {
        $route = route('mou.update', $mou);
        $method = 'PUT';
        $years = $this->get_list_of_years();
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $provinces = Province::all();
        $old = $mou;
        return view('add_edit_mou', compact('route', 'method', 'years', 'months', 'mou', 'provinces', 'old'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mou $mou)
    {
        $validate = $request->validate(
            [
                'province' => 'required',
                'file' => 'required|mimetypes:application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                'year' => 'required',
                'month' => 'required',
            ],
            [
                'file.mimetypes' => 'Your file type should be either PDF, DOC or DOCX.',
            ]
        );

        $mou->province = $request->province;
        $mou->year = $request->year;
        $mou->month = $request->month;

        if ($request->hasFile('file')) {
            $name = $request->province . '_' . $request->year . microtime(true) . '.' . $request->file->getClientOriginalExtension();
            $path = $request->file->storeAs('mous', $name);
            $mou->file = $path;
        }

        $mou->save();
        Session::flash('message', ["Update Successful!", "MoU updated Successfully!", "success"]);
        return redirect()->route('mou.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mou  $mou
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mou $mou)
    {
        $mou->delete();
        Session::flash('message', ["Deletion Successful!", "MoU deleted Successfully!", "success"]);
        return redirect()->route('mou.index');
    }
}
