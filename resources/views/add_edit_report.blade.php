@extends('layouts.app')
@section('content')
    <div class="container mt-5">
      <div class="row">
          <form action="{{ $route }}" method="POST" class="row g-3 add_edit_report_form" enctype="multipart/form-data">
            @method($method)
            @csrf
            <div class="col-sm-12">
              <div class="form-group pt-3">
                <label for="province_select_box">Works with selects</label>
                <select class="form-control form-control-lg" name="province" id="province_select_box" aria-label="Select Province Select Box" required>
                  <option selected value="">Select Province</option>
                  @foreach ($provinces as $province)
                    <option value="{{ $province->id }}"
                      @if (isset($old) && $old->province == $province->id)
                          selected="selected"
                      @endif
                    >{{ $province->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-12" id="event_type_select_box_container">
              <div class="form-group pt-3">
                <label for="event_type_select_box">Event Type</label>
                <select class="form-control form-control-lg" name="event_type" id="event_type_select_box" aria-label="Select The Event Type" required>
                  <option selected value="">Select Event Type</option>
                  @foreach ($event_types as $event_type)
                    <option value="{{ $event_type->id }}"
                      @if (isset($old) && $old->event_type_id == $event_type->id)
                          selected="selected"
                      @endif
                    >{{ $event_type->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group pt-3">
                <label for="years_select_box">List of Years</label>
                <select class="form-control form-control-lg" name="year" id="years_select_box" aria-label="Select Years Select Box" required>
                    <option value="">Select Year</option>
                    @foreach ($years as $year)
                      <option value="{{ $year }}"
                        @if (isset($old) && $old->year == $year)
                          selected="selected"
                        @elseif (!isset($old) && $year == date('Y'))
                            selected="selected"
                        @endif
                      >{{ $year}}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group pt-3">
                <label for="months_select_box">List of Months</label>
                <select class="form-control form-control-lg" name="month" id="months_select_box" aria-label="Select Month Select Box" required>
                    <option value="">Select Month</option>
                    @foreach ($months as $month)
                      <option value="{{ $month }}"
                        @if (isset($old) && $old->month == $month)
                          selected="selected"
                        @elseif (!isset($old) && $month == date('F'))
                            selected="selected"
                        @endif
                      >{{ $month}}</option>
                    @endforeach
                </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group pt-3">
                <label for="weeks_select_box">List of Weeks</label>
                <select class="form-control form-control-lg" name="week" id="weeks_select_box" aria-label="Select Week Select Box" required>
                    <option value="">Select Week</option>
                    <option value="1"
                      @if (isset($old) && $old->year == 1)
                          selected="selected"
                      @endif
                    >1</option>
                    <option value="2"
                      @if (isset($old) && $old->week == 2)
                          selected="selected"
                      @endif
                    >2</option>
                    <option value="3"
                      @if (isset($old) && $old->week == 3)
                          selected="selected"
                      @endif
                    >3</option>
                    <option value="4"
                      @if (isset($old) && $old->week == 4)
                          selected="selected"
                      @endif
                    >4</option>
                </select>
              </div>
            </div>
           
            <div class="col-sm-12">
              <div class="border rounded p-3">
                <label for="original_weekly_report_file">Original weekly report file</label>
                <input type="file" class="form-control form-control-lg border-0 mt-2 ps-3" name="weekly_report" id="original_weekly_report_file" placeholder="123">
              </div>
            </div>
            <div class="col-sm-12">
                <button type="button" class="btn btn-success btn-lg btn-block mt-3 add_edit_report_form_submit_btn">Save</button>
                <input type="text" class="d-none" name="json_data" id="json_data_input_field">
            </div>
          </form>
      </div>
  </div>
@endsection


<script>
  var fields = {!! $fields !!};
  var event_types = {!! $event_types !!};
</script>
