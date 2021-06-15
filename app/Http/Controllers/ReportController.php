<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Province;
use App\Models\Topic;
use App\Models\Fields;
use App\Models\EventType;
use App\Models\Testimonial;
use App\Http\Traits\CommonFunctions;
use Illuminate\Http\Request;
use Storage;
use Session;
use DB;

class ReportController extends Controller
{
    use CommonFunctions;
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

        // dd($request);
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

        // Loop through testimonials.
        if ($request->testimonial) {
            foreach ($request->testimonial as $key => $testimoniala) {

                $testim = new Testimonial;

                // Uploading image of the person.
                if ($request->hasFile('testimonial.'.$key.'.2')) {
                    $name = strtotime(date('Y-m-dTH:i:s ')) . $request->file('testimonial.'.$key.'.2')->getClientOriginalName();
                    $testi_image = $request->file('testimonial.'.$key.'.2')->storeAs('testimonial_image', $name);
                    $testim->image = $testi_image;
                }
                $testim->report_id = $report->id;
                $testim->testimonial = $testimoniala[0];
                $testim->name = $testimoniala[1];
                $testim->save();
            }
        }
        
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

    public function specific_report(Request $request) {
        // dd($request->input());
        
        if ($request->month == null && $request->year == null && $request->week == null && $request->event_type == null && $request->province == null) {
            $reports = 'Empty';
        }
        else if ($request->month && $request->month[0] == 'all' && $request->year && $request->year[0] == 'all' && $request->week && $request->week[0] == 'all' && $request->event_type && $request->event_type[0] == 'all' && $request->province && $request->province[0] == 'all') {
            // This section is working just fine.
            $reports = Report::all();
        }
        else {
            $reports = DB::table('reports');

            if ($request->year && $request->year[0] != 'all') {
                $reports->whereIn('year', $request->year);
            }

            if ($request->month && $request->month[0] != 'all') {
                $reports->whereIn('month', $request->month);
            }

            if ($request->week && $request->week[0] != 'all') {
                $reports->whereIn('week', $request->week);
            }

            if ($request->province && $request->province[0] != 'all') {
                $reports->whereIn('province', $request->province);
            }

            if ($request->event_type && $request->event_type[0] != 'all') {
                $reports->whereIn('event_type_id', $request->event_type);
            }

            $reports = $reports->get();
        }

        // dd($reports);

        $filter_params = $request->input();
        $event_types = EventType::all();
        $provinces = Province::all();
        $fields = Fields::all();
        $years = $this->get_list_of_years();
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'September', 'October', 'November', 'December'];
        return view('specific_report', compact('reports', 'provinces', 'fields', 'years', 'months', 'event_types', 'filter_params'));

    }
}
