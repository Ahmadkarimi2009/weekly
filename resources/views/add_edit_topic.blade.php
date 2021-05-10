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
                <label for="topic_name">Name</label>
                <input type="text" class="form-control form-control-lg"
                  @if (isset($old))
                    value="{{ $old->name }}"
                  @endif
                name="name" id="topic_name" placeholder="A title for the topic" required>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="form-group mt-3">
                <label for="topic_type">Topic Type</label>
                <select class="form-control form-control-lg" name="type" id="topic_type" aria-label="Select Topic Select Box" required>
                    <option value="">Select Type</option>
                    <option value="individual"
                      @if (isset($old) && $old->type == 'individual')
                          selected="selected"
                      @endif
                    >Individual</option>
                    <option value="group"
                      @if (isset($old) && $old->type == 'group')
                          selected="selected"
                      @endif
                    >Group</option>
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