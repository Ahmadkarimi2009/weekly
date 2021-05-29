<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Province;
use App\Models\Topic;
use App\Models\Fields;
use App\Models\EventType;
use Illuminate\Http\Request;
use Storage;
use Session;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('activities');
        $reports = Report::all();
        $provinces = Province::all();
        $event_types = EventType::all();

        dd($reports[6]->json_data);
        return view('reports', compact('reports', 'provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //  dd(date('F', strtotime('2020-12-23')));   
        $route = route('report.store');
        $method = 'POST';
        $provinces = Province::all();
        $event_types = EventType::all();
        $fields = Fields::all();
        $years = $this->get_list_of_years();
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'September', 'October', 'November', 'December'];
        return view('add_edit_report', compact('route', 'method', 'provinces', 'years', 'months', 'event_types', 'fields'));
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
            'province' => 'required',
            'event_type' => 'required',
            'year' => 'required',
            'month' => 'required',
            'week' => 'required',
            'json_data' => 'required'
        ]);
        // if ($request->hasFile('weekly_report')) {
        //     $name = strtotime(date('Y-m-dTH:i:s')) . $request->file('weekly_report')->getClientOriginalName();
        //     $weekly_report_file = $request->file('weekly_report')->storeAs('weekly_reports', $name);
        // }

        $report = new Report;
        $report->province = $request->province;
        $report->year = $request->year;
        $report->month = $request->month;
        $report->week = $request->week;
        $report->event_type_id = $request->event_type;
        $report->json_data = json_decode($request->json_data);

        $report->save();

        Session::flash('message', ['Insertion Successful!', 'Province Store Successfully!', 'success']);
        return redirect()->route('activities', $request->event_type);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return redirect()->route('activities');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        $old = $report;
        $route = route('report.update', $report->id);
        $method = 'PUT';
        $provinces = Province::all();
        $years = $this->get_list_of_years();
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'September', 'October', 'November', 'December'];
        return view('add_edit_report', compact('route', 'method', 'provinces', 'years', 'months', 'old'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        // if ($request->hasFile('weekly_report')) {
        //     // Delete previously uploaded file.
        //     Storage::delete($report->weekly_report_file);
        //     $name = strtotime(date('Y-m-dTH:i:s')) . $request->file('weekly_report')->getClientOriginalName();
        //     $weekly_report_file = $request->file('weekly_report')->storeAs('weekly_reports', $name);

        //     // Update the record based on the new uploaded file.
        //     $report->weekly_report_file = $weekly_report_file;
        // }

        $report->province = $request->province;
        $report->year = $request->year;
        $report->month = $request->month;
        $report->week = $request->week;
        $report->json_data = $request->json_data;
        $report->event_type_id = $request->event_type;

        $report->save();

        Session::flash('message', ['Update Successful!', 'Province Updated Successfully!', 'success']);
        return redirect()->route('activities', $event_type_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        Storage::delete($report->weekly_report_file);
        $report->delete();
        Session::flash('message', ["Deletion Successful!", "Province Deleted Successfully!", "success"]);
        return redirect()->route('report.index');
    }

    public function get_list_of_years() {
        $base_year = 2010;
        $current_year = date('Y');
        for ($base_year; $base_year <= $current_year; $base_year++) {
            $years[] = $base_year;
        }

        return $years;
    }

    public function event_type($event_type_id = 1) {
        $event_type = EventType::find($event_type_id);
        $reports = Report::where('event_type_id', $event_type_id)->get();
        $provinces = Province::all();
        $fields = Fields::all();
        $years = $this->get_list_of_years();
        $province = "All Provinces";
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'September', 'October', 'November', 'December'];

        return view('reports', compact('reports', 'provinces', 'fields', 'event_type', 'years', 'months', 'province'));
    }

    public function province_activity($province_id, $event_type_id) {

        $province = Province::find($province_id)->name;
        $event_type = EventType::find($event_type_id);
        $reports = Report::where(['event_type_id' => $event_type_id, 'province' => $province_id])->get();
        $provinces = Province::all();
        $fields = Fields::all();
        $years = $this->get_list_of_years();
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'September', 'October', 'November', 'December'];

        return view('reports', compact('reports', 'provinces', 'fields', 'event_type', 'years', 'months', 'province'));
    }
}
