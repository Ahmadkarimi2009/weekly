<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    <title>Topics</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($topics as $topic)
                    <tr>
                        <th>{{ $topic->id }}</th>
                        <td>{{ $topic->name }}</td>
                        <td>{{ $topic->type }}</td>
                        <td>
                            <a href="{{ route('topic.edit', $topic->id) }}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('topic.destroy', $topic->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
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
