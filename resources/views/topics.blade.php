<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">

    <title>Topics</title>
  </head>
  <body>
      @include('navbar')
      <div class="container mt-5">
        <div class="row">
            <table class="table table-bordered" id="topics_table">
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
                            <a href="{{ route('topic.edit', $topic->id) }}" class="btn btn-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3.38 8A9.502 9.502 0 0112 2.5a9.502 9.502 0 019.215 7.182.75.75 0 101.456-.364C21.473 4.539 17.15 1 12 1a10.995 10.995 0 00-9.5 5.452V4.75a.75.75 0 00-1.5 0V8.5a1 1 0 001 1h3.75a.75.75 0 000-1.5H3.38zm-.595 6.318a.75.75 0 00-1.455.364C2.527 19.461 6.85 23 12 23c4.052 0 7.592-2.191 9.5-5.451v1.701a.75.75 0 001.5 0V15.5a1 1 0 00-1-1h-3.75a.75.75 0 000 1.5h2.37A9.502 9.502 0 0112 21.5c-4.446 0-8.181-3.055-9.215-7.182z"></path></svg>
                            </a>
                            <form action="{{ route('topic.destroy', $topic->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm delete_forms">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M16 1.75V3h5.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75zm-6.5 0a.25.25 0 01.25-.25h4.5a.25.25 0 01.25.25V3h-5V1.75z"></path><path d="M4.997 6.178a.75.75 0 10-1.493.144L4.916 20.92a1.75 1.75 0 001.742 1.58h10.684a1.75 1.75 0 001.742-1.581l1.413-14.597a.75.75 0 00-1.494-.144l-1.412 14.596a.25.25 0 01-.249.226H6.658a.25.25 0 01-.249-.226L4.997 6.178z"></path><path d="M9.206 7.501a.75.75 0 01.793.705l.5 8.5A.75.75 0 119 16.794l-.5-8.5a.75.75 0 01.705-.793zm6.293.793A.75.75 0 1014 8.206l-.5 8.5a.75.75 0 001.498.088l.5-8.5z"></path></svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    
    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/js/datatable.js') }}"></script>
    <script src="{{ asset('/js/datatable_bootstrap.js') }}"></script>
    <script src="{{ asset('/js/sweetalert.js') }}"></script>
    <script src="{{ asset('/js/forms.js') }}"></script>
    <script src="{{ asset('/js/snippet.js') }}"></script>
</body>
</html>
@if(Session::has('message'))
    <script>
        swal('{{ Session::get('message')[0]}}', '{{ Session::get('message')[1]}}', '{{ Session::get('message')[2]}}');
    </script>
@endif
