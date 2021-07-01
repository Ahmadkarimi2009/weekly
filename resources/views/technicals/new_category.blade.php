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
                <label for="category_name">Name</label>
                <input type="text" class="form-control form-control-lg"
                  @if (isset($old))
                    value="{{ $old->name }}"
                  @endif
                name="name" id="category_name" placeholder="The name of Cateogry" required>
              </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group pt-3">
                  <label for="fields_select_box">List of Parent Categories</label>
                  <select class="form-control form-control-lg" name="parent" id="fields_select_box" aria-label="Select Field Select Box">
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
              <button type="submit" class="btn btn-success btn-lg btn-block mt-3">Save</button>
            </div>
          </form>
      </div>
  </div>
@endsection