@extends('layouts.app')
@section('css-libs')
  <link href="{{ asset('css/text_editor/trumbowyg.min.css') }}" rel="stylesheet"></link>
@endsection

@section('content')
    <div class="container mt-5">
          @include('partials.errors')
          <form action="{{ $route }}" method="POST" class="row" enctype="multipart/form-data">
            @method($method)
            @csrf

            <div class="col-sm-12">
              <div class="form-group">
                <label for="purpose_input_field">Purpose</label>
                <input type="text" class="form-control form-control-lg" name="purpose" id="purpose_input_field" value="{{ isset($old->purpose) ? $old->purpose : '' }}" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="start_date_input_field">Start date</label>
                <input type="date" class="form-control form-control-lg" name="start_date" id="start_date_input_field" value="{{ isset($old->start_date) ? $old->start_date : '' }}" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="end_date_input_field">End date</label>
                <input type="date" class="form-control form-control-lg" name="end_date" id="end_date_input_field" value="{{ isset($old->end_date) ? $old->end_date : '' }}" required>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group pt-3">
                    <label for="from_province_select_box">From province</label>
                    <select name="from_province_id" id="from_province_select_box" class="form-control form-control-lg" required>
                      @foreach ($provinces as $province)
                        <option value="{{ $province->id }}"
                          @if (isset($old) && $old->from_province_id == $province->id)
                              selected="selected"
                          @endif
                        >{{ $province->name}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group pt-3">
                    <label for="to_province_select_box">To province</label>
                    <select name="to_province_id" id="to_province_select_box" class="form-control form-control-lg" required>
                      @foreach ($provinces as $province)
                        <option value="{{ $province->id }}"
                          @if (isset($old) && $old->to_province_id == $province->id)
                              selected="selected"
                          @endif
                        >{{ $province->name}}</option>
                      @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group pt-3">
                    <label for="type_of_trip_select_box">Type of the trip</label>
                    <select name="category" id="type_of_trip_select_box" class="form-control form-control-lg" required>
                        <option
                          @if (isset($old) && $old->category == 'Assessment & Evaluation')
                              selected="selected"
                          @endif
                        >Assessment & Evaluation</option>
                        <option
                          @if (isset($old) && $old->category == 'Blogging')
                              selected="selected"
                          @endif      
                        >Blogging</option>
                        <option
                          @if (isset($old) && $old->category == 'Logistics & Procurement')
                              selected="selected"
                          @endif
                        >Logistics & Procurement</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="details_text_area">Details</label>
                <textarea name="details" id="" cols="30" rows="10" class="form-control text_area">
                  {!! isset($old->details) ? $old->details : '' !!}
                </textarea>
              </div>
            </div>
            @include('partials.file_input_group')
            @foreach($staff as $member)
                <div class="col-md-4 col-xl-3 mt-3">
                    <div class="card staff_list_card" data-staff_id="{{ $member->id }}">
                      <div class="text-center bg-light car_image_holder">
                          <img src="{{ asset($member->image) }}" class="card-img-top h-100 rounded-circle" alt="{{ $member->name }}">
                      </div>
                      <div class="card-body">
                          <h3>{{ $member->ipso_id }}</h3>
                          <h5 class="card-title">{{ $member->name }}</h5>
                          <h6 class="card-title">{{ $member->father_name }}</h6>
                          <span class="badge badge-primary">{{ $member->province}}, {{ $member->district}}</span>
                      </div>
                  </div>
                </div>
            @endforeach
            <div class="col-sm-12">
              <button type="button" class="btn btn-success btn-lg btn-block mt-3 add_edit_report_form_submit_btn">Save</button>
              <input type="text" class="d-none" name="staff_ids" id="input_for_staff_ids">
            </div>
          </form>
  </div>
@endsection

@section('js-scripts')
  <script src="{{ asset('js/text_editor/trumbowyg.min.js') }}"></script>
  <script src="{{ asset('js/add_edit_training.js') }}"></script>
  @isset($old)
    <script>
      var old_entity = {!! $old !!};
    </script>
  @endisset
    <script>
    var parent_categories = {!! $parent_categories !!};
    var child_categories = {!! $child_categories !!};
  </script>
  <script src="{{ asset('js/add_more_file_inputs.js') }}"></script>

  <script>
    $('.text_area').trumbowyg();
  </script>
@endsection
