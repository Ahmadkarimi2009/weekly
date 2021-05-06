<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    <title>Home Page</title>
  </head>
  <body>
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
                            <button class="btn btn-success btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="{{ asset('/js/bootstrap.js') }}"></script>
  </body>
</html>
