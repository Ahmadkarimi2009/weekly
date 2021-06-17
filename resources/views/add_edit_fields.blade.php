@extends('layouts.app')
@section('content')
    @if ($errors->any())
      <div class="alert alert-danger alert-dismissible fade show">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              @endforeach
          </ul>
      </div>
    @endif
    <div class="container mt-5">
      <div class="row">
          <form action="{{ $route }}" method="POST" class="w-100">
            @method($method)
            @csrf
            <div class="col-sm-12">
              <div class="form-group mt-3">
                <label for="field_name">Field Name</label>
                <input type="text" class="form-control form-control-lg"
                  @if (isset($old))
                    value="{{ $old->name }}"
                  @endif
                name="name" id="field_name" placeholder="Name of the Field" required>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group mt-3">
                <label for="field_machine_name">Field Machine Name</label>
                <input type="text" class="form-control form-control-lg"
                  @if (isset($old))
                    value="{{ $old->machine_name }}"
                  @endif
                name="machine_name" id="field_machine_name" placeholder="Name of the Field in the System" required readonly>
              </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group pt-3">
                    <label for="field_data_type">Data Type</label>
                    <select class="form-control form-control-lg" name="data_type" id="field_data_type" aria-label="Select Field Data Type" required>

                        
                        <option value="text"
                            @if (isset($old) && $old->data_type == "text")
                                selected="selected"
                            @endif
                        >Small Text</option>
                        <option value="number"
                            @if (isset($old) && $old->data_type == "number")
                                selected="selected"
                            @endif
                        >Number</option>
                        <option value="checkbox"
                            @if (isset($old) && $old->data_type == "checkbox")
                                selected="selected"
                            @endif
                        >Checkbox</option>
                        <option value="textarea"
                            @if (isset($old) && $old->data_type == "textarea")
                                selected="selected"
                            @endif
                        >Large Text</option>
                        <option value="date"
                            @if (isset($old) && $old->data_type == "date")
                                selected="selected"
                            @endif
                        >Date</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-12 event_type_related_fields">
                <label>Searchable</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="searchable" id="searchable_true" value="true"
                        @if (isset($old) && $old->searchable == "true")
                            checked
                        @endif
                    >
                    <label class="form-check-label" for="searchable_true">
                        True
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="searchable" id="searchable_false" value="false"
                        @if (isset($old) && ($old->searchable == "" || $old->searchable == "false"))
                            checked
                        @endif
                    >
                    <label class="form-check-label" for="searchable_false">
                        False
                    </label>
                </div>
            </div>
            <div class="col-sm-12 mt-3">
                <button type="submit" class="btn btn-success btn-lg btn-block">Save</button>
            </div>
          </form>
      </div>
  </div>
@endsection

@section('js-scripts')
    <script src="{{ asset('/js/fields_settings.js') }}"></script>
@endsection
