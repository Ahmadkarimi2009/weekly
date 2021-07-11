@extends('layouts.app')
@section('content')
    <div class="container mt-5">
      <div class="row">
          @include('partials.errors')
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
                <label for="event_type_select_box">Activity Type</label>
                <select class="form-control form-control-lg" name="event_type" id="event_type_select_box" aria-label="Select The Activity Type" required>
                  <option selected value="">Select Activity Type</option>
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
            <div class="col-sm-12">
              <fieldset class="border p-2 mb-3">
                <legend class="w-auto">Testimonail:</legend>
                <div class="form-group pt-3">
                  <label for="testimonial_number_1">Testimonial</label>
                  <textarea class="form-control" id="testimonial_number_1" rows="4" name="testimonial[1][0]"></textarea>
                </div>
                <div class="form-group pt-3">
                  <label for="testimonial_number_1_name">Name of Person</label>
                  <input type="text" class="form-control" id="testimonial_number_1_name" name="testimonial[1][1]">
                </div>
                <div class="col-sm-12">
                  <div class="border rounded p-3">
                    <label for="testimonial_person_image_1">Image of the person (If any)</label>
                    <input type="file" class="form-control form-control-lg border-0 mt-2 ps-3" name="testimonial[1][2]" id="testimonial_person_image_1">
                  </div>
                </div>
              </fieldset>
            </div>
            <div class="col-sm-12">
              <a role="button" class="btn btn-outline-success" id="add_more_testimonial_btn">Add More Testimonial</a>
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
                        @if (date('F') == $month)
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
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3" >3</option>
                    <option value="4" >4</option>
                </select>
              </div>
            </div>
           
            <div class="col-sm-12">
              <div class="border rounded p-3">
                <label for="upload_images_input">Images</label>
                <input type="file" class="form-control form-control-lg border-0 mt-2 ps-3" name="images[]" id="upload_images_input" multiple>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="border rounded p-3">
                <label for="original_weekly_report_file">Original weekly report file</label>
                <input type="file" class="form-control form-control-lg border-0 mt-2 ps-3" name="weekly_report" id="original_weekly_report_file">
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
  var provinces = {!! $provinces !!};
  var months = {!! json_encode($months) !!};
  var years = {!! json_encode($years) !!};

</script>

@isset($old)
  <script>
    var old_entity = {!! $old_entity !!};
  </script>
@endisset
