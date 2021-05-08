<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    <title>Provinces</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <form action="{{ $route }}" method="POST" class="row g-3">
              @method($method)
              @csrf
              <div class="col-sm-12">
                <div class="form-floating">
                  <input type="text" class="form-control"
                    @if (isset($old))
                      value="{{ $old->name }}"
                    @endif
                  name="name" id="province_name" placeholder="123" required>
                  <label for="province_name">Province Name</label>
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
