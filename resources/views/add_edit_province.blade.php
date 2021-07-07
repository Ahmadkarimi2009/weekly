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
                <label for="province_name">Province Name</label>
                <input type="text" class="form-control form-control-lg"
                  @if (isset($old))
                    value="{{ $old->name }}"
                  @endif
                name="name" id="province_name" placeholder="Name of the Province" required>
              </div>
            </div>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-success btn-lg btn-block">Save</button>
            </div>
          </form>
      </div>
  </div>
@endsection
