<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/navbar.css') }}" rel="stylesheet">

    <title>Home Page</title>
  </head>
  <body>
      @include('navbar')
      <div class="container mt-5">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($provinces as $province)
                    <tr>
                        <th>{{ $province->id }}</th>
                        <td>{{ $province->name }}</td>
                        <td>
                            <a href="{{ route('province.edit', $province->id) }}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('province.destroy', $province->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm delete_forms">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/js/sweetalert.js') }}"></script>
    <script src="{{ asset('/js/forms.js') }}"></script>
  </body>
</html>
@if(Session::has('message'))
    <script>
        swal('{{ Session::get('message')[0]}}', '{{ Session::get('message')[1]}}', '{{ Session::get('message')[2]}}');
    </script>
@endif
