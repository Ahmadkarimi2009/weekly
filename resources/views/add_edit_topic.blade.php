<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    <title>Reports</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <form action="{{ $route }}" method="POST" class="row g-3">
              @method($method)
              @csrf
              <div class="col-sm-6">
                <div class="form-floating">
                  <input type="text" class="form-control"
                    @if (isset($old))
                      value="{{ $old->name }}"
                    @endif
                  name="name" id="topic_name" placeholder="123" required>
                  <label for="topic_name">Name</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <select class="form-select" name="type" id="topic_type" aria-label="Select Topic Select Box" required>
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
                  <label for="topic_type">Topic Type</label>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-success btn-lg">Save</button>
                </div>
              </div>
            </form>
        </div>
    </div>
    
    <script src="{{ asset('/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/js/forms.js') }}"></script>
  </body>
</html>
