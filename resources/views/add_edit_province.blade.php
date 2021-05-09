<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/navbar.css') }}" rel="stylesheet">

    <title>Provinces</title>
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
    
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/js/sweetalert.js') }}"></script>
    <script src="{{ asset('/js/forms.js') }}"></script>
  </body>
</html>
