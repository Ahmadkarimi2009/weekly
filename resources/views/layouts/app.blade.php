<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Weely Reports') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <!-- Bootstrap CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/datatable_bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/datatable_buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/printings.css') }}" rel="stylesheet">
    @yield('css-libs')

</head>
<body>
    <div id="app">
        @include('navbar')

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('/js/jquery.js') }}"></script>
    <script src="{{ asset('/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/js/datatable/datatable.js') }}"></script>
    <script src="{{ asset('/js/datatable/datatable_bootstrap.js') }}"></script>
    <script src="{{ asset('/js/sweetalert.js') }}"></script>
    <script src="{{ asset('/js/forms.js') }}"></script>
    <script src="{{ asset('/js/load_in_all_pages.js') }}"></script>
    @yield('js-scripts')
</body>
</html>
@if(Session::has('message'))
    <script>
        swal('{{ Session::get('message')[0]}}', '{{ Session::get('message')[1]}}', '{{ Session::get('message')[2]}}');
    </script>
@endif