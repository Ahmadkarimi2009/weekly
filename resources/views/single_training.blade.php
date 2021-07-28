@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
              <h1 class="display-4 font-italic">{{ $training->title }}</h1>
              <p class="lead my-3 text-success">
                @if ($training->location != "" && $training->location != " " && $training->location != "  ")
                    {{ $training->location }},
                @endif  
                {{ date('F d,Y', strtotime($training->start_date)) }} - {{ date('F d,Y', strtotime($training->end_date)) }}</p>

                <h1 class="display-1">Details</h1>
                <p class="lead">
                    {!! $training->details !!}
                </p>
            </div>
        </div>
    @include('partials.display_all_types_of_parent_category_files', ['object' => $training])

    </div>

    @include('partials.modal');
@endsection

@section('js-scripts')
    <script>
        $(document).ready(function(){
            $('.show_big_image').on('click', function(){
                $('#show_image_modal').find('img').attr('src', $(this).attr('src'));
                $('#show_image_modal').modal();
            });
        });
    </script>
@endsection
