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

      <div class="col-sm-6">
        <div class="form-group">
          <label for="title_input_field">Title</label>
          <input type="text" class="form-control form-control-lg" name="title" id="title_input_field" required>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
            <label for="province_select_box">Province</label>
            <select name="province" id="province_select_box" class="form-control form-control-lg">
              @foreach ($provinces as $province)
                <option value="{{ $province->id }}"
                  @if (isset($old) && $old->province == $province->name)
                      selected="selected"
                  @endif
                >{{ $province->name}}</option>
              @endforeach
            </select>
        </div>
      </div>
      <div class="col-sm-12">
        <div class="form-group">
          <label for="avenue_input_field">Text Area</label>
          <textarea name="details" id="" cols="30" rows="10" class="form-control text_area"></textarea>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="avenue_input_field">Avenue</label>
          <input type="text" class="form-control form-control-lg" name="avenue" id="avenue_input_field">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <label for="date_input_field">Date</label>
          <input type="date" class="form-control form-control-lg" name="date" id="date_input_field" required>
        </div>
      </div>
      @include('partials.file_input_group')
      <div class="col-sm-12">
        <button type="button" class="btn btn-success btn-lg btn-block mt-3 add_edit_report_form_submit_btn">Save</button>
      </div>
    </form>
  </div>
@endsection

@section('js-scripts')
  @isset($old)
    <script>
      var old_entity = {!! $old !!};
    </script>
  @endisset

  <script>
    var parent_categories = {!! $parent_categories !!};
    var child_categories = {!! $child_categories !!};
  </script>

  <script src="{{ asset('js/text_editor/trumbowyg.min.js') }}"></script>
  <script src="{{ asset('js/add_more_file_inputs.js') }}"></script>
  <script>
    $('.text_area').trumbowyg();
  </script>
@endsection
