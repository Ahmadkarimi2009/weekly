@extends('layouts.app')
@section('content')
    <div class="container mt-5">
      <div class="row">
          @include('partials.errors')
          <form action="{{ $route }}" method="POST" class="w-100">
            @method($method)
            @csrf
            <div class="col-sm-12">
              <div class="form-group mt-3">
                <label for="event_type_name">Name</label>
                <input type="text" class="form-control form-control-lg"
                  @if (isset($old))
                    value="{{ $old->name }}"
                  @endif
                name="name" id="event_type_name" placeholder="The name of the Event Type" required>
              </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group pt-3">
                  <label for="fields_select_box">List of Fields <span class="text-secondary">(Hold Control to select multiple fields)</span></label>
                  <select class="form-control form-control-lg" name="fields[]" id="fields_select_box" aria-label="Select Field Select Box" required multiple>
                      <option value="">Select Field</option>
                      @foreach ($fields as $field)
                        <option value="{{ $field->id }}"
                            @if (isset($old))
                                @foreach ($old->fields as $old_field)
                                    @if ($old_field == $field->id)
                                    selected="selected"
                                    @endif
                                @endforeach
                            @endif
                        >{{ $field->name }}</option>
                      @endforeach
                  </select>
                </div>
              </div>
            <div class="col-sm-12">
              <button type="submit" class="btn btn-success btn-lg btn-block mt-3">Save</button>
            </div>
          </form>
      </div>
  </div>
@endsection