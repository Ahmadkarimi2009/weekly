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
                  <label for="name_input_field">Full Name</label>
                  <input type="text" class="form-control form-control-lg" name="name" id="name_input_field" placeholder="Write the Name" value="{{ isset($old) ? $old->name : ''}}" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group pt-3">
                  <label for="father_name_input_field">Father Name</label>
                  <input type="text" class="form-control form-control-lg" name="father_name" id="father_name_input_field" placeholder="Write the Father's name" value="{{ isset($old) ? $old->father_name : ''}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group pt-3">
                  <label for="position_input_field">Position</label>
                  <input type="text" class="form-control form-control-lg" name="position" id="position_input_field" placeholder="Write the Position" value="{{ isset($old) ? $old->position : ''}}" required>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group pt-3">
                  <label for="ipso_id_input_field">IPSO ID</label>
                  <input type="number" class="form-control form-control-lg" name="ipso_id" id="ipso_id_input_field" placeholder="Write the IPSO ID number" value="{{ isset($old) ? $old->ipso_id : ''}}" required>
                </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group pt-3">
                <label for="gender_select_box">Gender</label>
                <select class="form-control form-control-lg" name="gender" id="gender_select_box" aria-label="Select Gender">
                    <option {{ isset($old) ? ($old->gender == 'Female' ? 'selected' : '') : ''}}>Female</option>
                    <option {{ isset($old) ? ($old->gender == 'Male' ? 'selected' : '') : ''}}>Male</option>
                </select>
              </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group pt-3">
                  <label for="province_input_field">Province</label>
                  <input type="text" class="form-control form-control-lg" name="province" id="province_input_field" placeholder="Write the Province" value="{{ isset($old) ? $old->province : ''}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group pt-3">
                  <label for="district_input_field">District</label>
                  <input type="text" class="form-control form-control-lg" name="district" id="district_input_field" placeholder="Write the District" value="{{ isset($old) ? $old->district : ''}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group pt-3">
                  <label for="address_input_field">Address</label>
                  <input type="text" class="form-control form-control-lg" name="address" id="address_input_field" placeholder="Write the Address" value="{{ isset($old) ? $old->address : ''}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group pt-3">
                  <label for="education_input_field">Education</label>
                  <input type="text" class="form-control form-control-lg" name="education" id="education_input_field" placeholder="Write the Education degree" value="{{ isset($old) ? $old->education : ''}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group pt-3">
                  <label for="tin_input_field">TIN Number</label>
                  <input type="number" class="form-control form-control-lg" name="education" id="tin_input_field" placeholder="Write the TIN Number" value="{{ isset($old) ? $old->tin_number : ''}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group pt-3">
                  <label for="working_location_input_field">Working Location</label>
                  <input type="number" class="form-control form-control-lg" name="education" id="working_location_input_field" placeholder="Write the Working Location of the this colleague" value="{{ isset($old) ? $old->working_location : ''}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group pt-3">
                  <label for="employment_date_input_field">Date of Employment</label>
                  <input type="date" class="form-control form-control-lg" name="date_of_employment" id="employment_date_input_field" placeholder="Choose the date of employment" value="{{ isset($old) ? $old->date_of_employment : ''}}">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="form-group pt-3">
                  <label for="profile_pic_input_field">Profile Picture</label>
                  <input type="file" class="form-control form-control-lg" name="profile_pic" id="profile_pic_input_field">
                </div>
            </div>
            @include('partials.file_input_group')
            <div class="col-sm-12">
                <button type="button" class="btn btn-success btn-lg btn-block mt-3 add_edit_report_form_submit_btn">Save</button>
            </div>
          </form>
      </div>
  </div>
@endsection

@isset($old)
  <script>
    var old_entity = {!! $old !!};
  </script>
@endisset
@section('js-scripts')
  <script>
    var parent_categories = {!! $parent_categories !!};
    var child_categories = {!! $child_categories !!};
  </script>
  <script src="{{ asset('js/add_more_file_inputs.js') }}"></script>
@endsection
