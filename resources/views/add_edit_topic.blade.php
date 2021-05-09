<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/navbar.css') }}" rel="stylesheet">

    <title>Reports</title>
  </head>
  <body>
      @include('navbar')
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
    
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/js/sweetalert.js') }}"></script>
    <script src="{{ asset('/js/forms.js') }}"></script>
  </body>
</html>
