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

        $validated = $request->validate([
            'province' => 'required',
            'event_type' => 'required',
            'year' => 'required',
            'month' => 'required',
            'week' => 'required',
            'json_data' => 'required'
        ]);

        $report = new Report;
        if ($request->hasFile('weekly_report')) {
            $new_file_extension = $request->file('weekly_report')->getClientOriginalExtension();
            $name = $request->province . $request->year. $request->month . $request->week . '.' . $new_file_extension;
            $path = 'weekly_reports/' . $name;

            // If the file is not yet uploaded.
            if (! Storage::exists('weekly_reports/' . $name)) {
                $path = $request->file('weekly_report')->storeAs('weekly_reports', $name);
            }

            $report->weekly_report_file = $path;
        }

        if ($request->hasFile('images')) {
            $images = [];
            foreach($request->file('images') as $index => $image) {
                $name = $request->province . $request->year. $request->month . $request->week . '_'. $index . '.' . $image->extension();
                $path = $image->storeAs('weekly_report_images', $name);
                $images[] = $path;
            }

            $report->images = $images;

        }
        
        
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

                if ($testimoniala[0] != null && $testimoniala[1] != null) {
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
        
        if ($request->month == null && $request->year == null && $request->week == null && $request->event_type == null && $request->province == null) {
            $reports = 'Empty';
        }
        else if        // dd($request->input());
            ($request->month && $request->month[0] == 'all' && $request->year && $request->year[0] == 'all' && $request->week && $request->week[0] == 'all' && $request->event_type && $request->event_type[0] == 'all' && $request->province && $request->province[0] == 'all') {
            // This section is working just fine.
            $reports = Report::all();
        }
        else {
            $year = $request->year;
            $month = $request->month;
            $week = $request->week;
            $event_type = $request->event_type;
            $province = $request->province;

            $reports = Report::when($year, function($query, $year){
                if ($year[0] != 'all') {
                    return $query->whereIn('year', $year);
                }
            })
            ->when($month, function($query, $month) {
                if ($month[0] != 'all') {
                    return $query->whereIn('month', $month);
                }
            })
            ->when($week, function($query, $week) {
                if ($week[0] != 'all') {
                    return $query->whereIn('week', $week);
                }
            })
            ->when($province, function($query, $province) {
                if ($province[0] != 'all') {
                    return $query->whereIn('province', $province);
                }
            })
            ->when($event_type, function($query, $event_type) {
                if ($event_type[0] != 'all') {
                    return $query->whereIn('event_type_id', $event_type);
                }
            })
            ->get();
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

    public function load_all_images() {
        $provinces = Province::all();
        $reports = Report::where('images', '<>', null)->get();
        $years = $this->get_list_of_years();
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'September', 'October', 'November', 'December'];

        return view('images', compact('reports', 'provinces', 'years', 'months'));
    }


    function readonly_specific_report(Request $request) {
        if ($request->month == null && $request->year == null && $request->week == null && $request->event_type == null && $request->province == null) {
            $reports = 'Empty';
        }
        else if        // dd($request->input());
            ($request->month && $request->month[0] == 'all' && $request->year && $request->year[0] == 'all' && $request->week && $request->week[0] == 'all' && $request->event_type && $request->event_type[0] == 'all' && $request->province && $request->province[0] == 'all') {
            // This section is working just fine.
            $reports = Report::all();
        }
        else {
            $year = $request->year;
            $month = $request->month;
            $week = $request->week;
            $event_type = $request->event_type;
            $province = $request->province;

            $reports = Report::when($year, function($query, $year){
                if ($year[0] != 'all') {
                    return $query->whereIn('year', $year);
                }
            })
            ->when($month, function($query, $month) {
                if ($month[0] != 'all') {
                    return $query->whereIn('month', $month);
                }
            })
            ->when($week, function($query, $week) {
                if ($week[0] != 'all') {
                    return $query->whereIn('week', $week);
                }
            })
            ->when($province, function($query, $province) {
                if ($province[0] != 'all') {
                    return $query->whereIn('province', $province);
                }
            })
            ->when($event_type, function($query, $event_type) {
                if ($event_type[0] != 'all') {
                    return $query->whereIn('event_type_id', $event_type);
                }
            })
            ->get();
        }



        $new_reports = [];

        $event_types = EventType::all();
        $fields = Fields::all()->toArray();
        $provinces = Province::all()->toArray();

        // Looping through the retreived reports so that we can create a curated and
        // well structured report before sending it to the front end.
        foreach($reports as $index => $report) {

            // Extracting Name of province using the province ID in the report.
            // The name is later used in generating the new array of reports where
            // Province name is used instead of ID in as the key for the record.
            $province_id = $report->province;
            $province_name = current(array_filter($provinces, function($province) use ($province_id){
                return $province_id == $province['id'];
            }));
            $province_name = $province_name['name'];
            // End of extraction.


            // Loop through the json data for this report.
            foreach($report->json_data as $field_name => $field_value) {

                // Extracting the field object that is currently being looped from
                // the list of Fields.
                $field_object = current(array_filter($fields, function($field) use ($field_name){
                    return $field['machine_name'] == $field_name;
                }));
                // End of Extraction for the field object.

                // Add those fields to the final collection that are meant to be displayed
                // on the specific report and skip the trivial details.
                if ($field_object['display_in_specific_report'] == 'true') {

                    // If this field is the in_scc_or_field.
                    if ($field_object['machine_name'] == 'in_scc_or_field') {
                        if ($field_value == 'SCC') {
                            if (!isset($new_reports[$report->event_type_id][$province_name]['SCC'])) {
                                $new_reports[$report->event_type_id][$province_name]['SCC'] = 1;
                            }
                            else {
                                $new_reports[$report->event_type_id][$province_name]['SCC'] += 1;
                            }
                        }
                        else {
                            if (!isset($new_reports[$report->event_type_id][$province_name]['Field'])) {
                                $new_reports[$report->event_type_id][$province_name]['Field'] = 1;
                            }
                            else {
                                $new_reports[$report->event_type_id][$province_name]['Field'] += 1;
                            }
                        }
                    }

                    // If this field is type of number.
                    else if ($field_object['data_type'] == 'number') {
                        if (!isset($new_reports[$report->event_type_id][$province_name][$field_name])) {
                            $new_reports[$report->event_type_id][$province_name][$field_name] = (int) $field_value;
                        }
                        else {
                            $new_reports[$report->event_type_id][$province_name][$field_name] += (int) $field_value;
                        }
                    }

                    // This section adds the provine name instead of the ID in case it is the
                    // "with_province" field that is being iterated.
                    else if ($field_object['machine_name'] == 'with_province') {
                        $with_province_name = $field_value;
                        $with_province_name = current(array_filter($provinces, function($province) use ($with_province_name){
                            return $with_province_name == $province['id'];
                        }));
                        $with_province_name = $with_province_name['name'];


                        if (!isset($new_reports[$report->event_type_id][$province_name][$field_name])) {
                            $new_reports[$report->event_type_id][$province_name][$field_name] = '* ' . $with_province_name;
                        }
                        else {
                            $new_reports[$report->event_type_id][$province_name][$field_name] .= ' * ' . $with_province_name;
                        }
                    }
                    else {
                        if (!isset($new_reports[$report->event_type_id][$province_name][$field_name])) {
                            $new_reports[$report->event_type_id][$province_name][$field_name] = '* ' .$field_value;
                        }
                        else {
                            $new_reports[$report->event_type_id][$province_name][$field_name] .= '<br>* ' . $field_value;
                        }
                    }
                }
            }
        }

        $filter_params = $request->input();
        $years = $this->get_list_of_years();
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'September', 'October', 'November', 'December'];
        return view('new_specific_report', compact('new_reports', 'provinces', 'fields', 'years', 'months', 'event_types', 'filter_params'));
    }
}
