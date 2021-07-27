@extends('layouts.app')
@section('content')
    <div class="container mt-5">
      <div class="row">
          @include('partials.errors')
          <form action="{{ $route }}" method="POST" class="w-100" enctype="multipart/form-data">
            @method($method)
            @csrf
            <div class="col-sm-12">
              <div class="form-group mt-3">
                <label for="image_year">Year</label>
                <input type="year" class="form-control form-control-lg"
                  @if (isset($old))
                    value="{{ $old->year }}"
                  @endif
                name="year" id="image_year" placeholder="The year this file is from" required>
              </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group pt-3">
                  <label for="parent_categories_select_box">Type of file</label>
                  <select class="form-control form-control-lg" name="parent_category" id="parent_categories_select_box" aria-label="Select Field Select Box">
                      <option value="">None</option>
                      @foreach ($parent_categories as $category)
                        <option value="{{ $category->id }}"
                          @if (isset($old))
                            @if ($old->parent_category_id == $category->id)
                              selected="selected"
                            @endif
                          @endif
                        >{{ $category->name }}</option>
                      @endforeach
                  </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group pt-3">
                  <label for="child_categories_select_box">Category of file</label>
                  <select class="form-control form-control-lg" name="child_category" id="child_categories_select_box" aria-label="Select child category Select Box">
                      <option value="">None</option>
                      @foreach ($child_categories as $category)
                        <option value="{{ $category->id }}"
                          @if (isset($old))
                            @if ($old->child_category_id == $category->id)
                              selected="selected"
                            @endif
                          @endif
                        >{{ $category->name }}</option>
                      @endforeach
                  </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="border rounded p-3">
                  <label for="upload_files_input">Files</label>
                  <input type="file" class="form-control form-control-lg border-0 mt-2 ps-3" name="files[]" id="upload_files_input" multiple>
                </div>
            </div>
            <div class="col-sm-12">
              <button type="submit" class="btn btn-success btn-lg btn-block mt-3">Save</button>
            </div>
          </form>
      </div>
  </div>
@endsection