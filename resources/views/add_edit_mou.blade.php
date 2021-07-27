@extends('layouts.app')
@section('content')
    <div class="container mt-5">
      <div class="row">
          @include('partials.errors')
          <form action="{{ $route }}" method="POST" class="row g-3 add_edit_report_form" enctype="multipart/form-data">
            @method($method)
            @csrf
            <div class="col-sm-6">
                <div class="form-group pt-3">
                    <label for="province_select_box">Province</label>
                    <select name="province" id="province_select_box" class="form-control form-control-lg">
                      @foreach ($provinces as $province)
                        <option value="{{ $province->name }}"
                          @if (isset($old) && $old->province == $province->name)
                              selected="selected"
                          @endif
                        >{{ $province->name}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group pt-3">
                  <label for="years_select_box">List of Years</label>
                  <select class="form-control form-control-lg" name="year" id="years_select_box" aria-label="Select Years Select Box" required>
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
            <div class="col-sm-12">
                <div class="form-group pt-3">
                  <label for="months_select_box">List of Months</label>
                  <select class="form-control form-control-lg" name="month" id="months_select_box" aria-label="Select Month Select Box" required>
                      <option value="">Select Month</option>
                      @foreach ($months as $month)
                        <option value="{{ $month }}" 
                          @if (isset($old) && $old->month == $month)
                            selected="selected"
                          @elseif (date('F') == $month)
                              selected="selected"
                          @endif
                        >{{ $month }}</option>
                      @endforeach
                  </select>
                </div>
            </div>
            <div class="col-sm-12">
              <div class="border rounded p-3 mt-5">
                <label for="file_input_field">File
                <input type="file" class="form-control form-control-lg border-0 mt-2 ps-3" name="file" id="file_input_field">
                @if (isset($old))
                  <div id="previous_file">
                    <br>
                    <span>Current File: </span>
                    <span class="badge badge-info"></span></label>
                    <a href="{{ asset($old->file_objects[0]->path ) }}" class="btn btn-info text-white btn-sm" target="_blank">{{ $old->file_objects[0]->name }}</a>
                  </div>
                @endif
              </div>
            </div>
            <div class="col-sm-12">
                <button type="button" class="btn btn-success btn-lg btn-block mt-3 add_edit_report_form_submit_btn">Save</button>
            </div>
          </form>
      </div>
  </div>
@endsection


<script>
</script>

@section('js-scripts')
  @isset($old)
    <script>
      var old_entity = {!! $old !!};

      $(document).ready(function(){
        $('#file_input_field').on('change', function(){
          $('#previous_file').remove();
        });
      });
    </script>
  @endisset
@endsection
