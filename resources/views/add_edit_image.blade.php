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
          <form action="{{ $route }}" method="POST" class="w-100" enctype="multipart/form-data">
            @method($method)
            @csrf
            <div class="col-sm-12">
              <div class="form-group mt-3">
                <label for="image_year">Year</label>
                <input type="year" class="form-control form-control-lg"
                  @if (isset($old))
                    value="{{ $old->name }}"
                  @endif
                name="year" id="image_year" placeholder="The year the photo is taken" required>
              </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group pt-3">
                  <label for="categories_select_box">List of Parent Categories</label>
                  <select class="form-control form-control-lg" name="category" id="categories_select_box" aria-label="Select Field Select Box">
                      <option value="">None</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                          @if (isset($old))
                            @if ($old->parent == $category->id)
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
                  <label for="provinces_select_box">List of Provinces</label>
                  <select class="form-control form-control-lg" name="province" id="provinces_select_box" aria-label="Select Field Select Box">
                      <option value="">None</option>
                      @foreach ($provinces as $province)
                        <option value="{{ $province->id }}"
                          @if (isset($old))
                            @if ($old->parent == $province->id)
                            selected="selected"
                            @endif
                          @endif
                        >{{ $province->name }}</option>
                      @endforeach
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
              <button type="submit" class="btn btn-success btn-lg btn-block mt-3">Save</button>
            </div>
          </form>
      </div>
  </div>
@endsection