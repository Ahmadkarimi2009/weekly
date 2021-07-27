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
      <div class="col-12 parent_div mt-3">
        <div class="d-flex align-items-stretch files_group">
          <div class="border border-success rounded p-3 flex-grow-1 mr-2">
            <label for="">Files / Images / Videos</label>
            <input type="file" class="form-control form-control-lg border-0 mt-2 ps-3" name="group_inputs[1][files][]" id="" multiple>

            <div class="form-group">
              <label for="">Type of File(s)</label>
              <select name="group_inputs[1][parent_category]" id="" class="form-control form-control-lg">
                @foreach ($parent_categories as $cat)
                  <option value="{{ $cat->id }}">{{ $cat->name}}</option>
                @endforeach
              </select>

              <div class="form-group mt-4">
                <label for="">Group of this files</label>
                <select name="group_inputs[1][child_category]" id="" class="form-control form-control-lg">
                  @foreach ($child_categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>
          </div>
          <button type="button" class="btn btn-success add_more_file_inputs" id="add_image_with_different_categories">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="white">
              <path d="M24 10h-10v-10h-4v10h-10v4h10v10h4v-10h10z"/>
            </svg>
          </button>
        </div>
      </div>
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
