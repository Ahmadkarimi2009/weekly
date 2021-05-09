<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\province;
use App\Models\Topic;
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
        $reports = Report::all();
        $provinces = province::all();
        $topics = Topic::all();

        return view('reports', compact('reports', 'provinces', 'topics'));
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
        $provinces = province::all();
        $topics = Topic::all();
        $years = $this->get_list_of_years();
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'September', 'October', 'November', 'December'];
        return view('add_edit_report', compact('route', 'method', 'provinces', 'topics', 'years', 'months'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('weekly_report')) {
            $name = strtotime(date('Y-m-dTH:i:s')) . $request->file('weekly_report')->getClientOriginalName();
            $weekly_report_file = $request->file('weekly_report')->storeAs('weekly_reports', $name);
        }

        $report = new Report;
        $report->province = $request->province;
        $report->topic = $request->topic;
        $report->number_of_male = $request->male;
        $report->number_of_female = $request->female;
        $report->year = $request->year;
        $report->month = $request->month;
        $report->week = $request->week;
        $report->weekly_report_file = $weekly_report_file;
        $report->indirect_benificiaries = $request->benificiaries;

        $report->save();

        Session::flash('message', ['Insertion Successful!', 'Province Store Successfully!', 'success']);
        return redirect()->route('report.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
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
        $provinces = province::all();
        $topics = Topic::all();
        $years = $this->get_list_of_years();
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'September', 'October', 'November', 'December'];
        return view('add_edit_report', compact('route', 'method', 'provinces', 'topics', 'years', 'months', 'old'));
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
        if ($request->hasFile('weekly_report')) {
            // Delete previously uploaded file.
            Storage::delete($report->weekly_report_file);
            $name = strtotime(date('Y-m-dTH:i:s')) . $request->file('weekly_report')->getClientOriginalName();
            $weekly_report_file = $request->file('weekly_report')->storeAs('weekly_reports', $name);

            // Update the record based on the new uploaded file.
            $report->weekly_report_file = $weekly_report_file;
        }

        $report->province = $request->province;
        $report->topic = $request->topic;
        $report->number_of_male = $request->male;
        $report->number_of_female = $request->female;
        $report->year = $request->year;
        $report->month = $request->month;
        $report->week = $request->week;
        $report->indirect_benificiaries = $request->benificiaries;

        $report->save();

        Session::flash('message', ['Update Successful!', 'Province Updated Successfully!', 'success']);
        return redirect()->route('report.index');
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
}
