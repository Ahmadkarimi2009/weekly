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
                  <label for="fields_select_box">Is it a parent category</label>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="parent" id="yes_option_for_parent" value="yes" checked>
                    <label class="form-check-label" for="yes_option_for_parent">
                      YES
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="parent" id="no_option_for_parent" value="no"
                      @if (isset($old) && $old->parent == "no")
                        checked
                      @endif
                    >
                    <label class="form-check-label" for="no_option_for_parent">
                      NO
                    </label>
                  </div>
                </div>
              </div>
            <div class="col-sm-12">
              <button type="submit" class="btn btn-success btn-lg btn-block mt-3">Save</button>
            </div>
          </form>
      </div>
  </div>
@endsection