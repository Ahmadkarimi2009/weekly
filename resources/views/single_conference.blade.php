@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron p-4 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
              <h1 class="display-4 font-italic">{{ $conference->title }}</h1>
              <p class="lead my-3 text-success">
                @if ($conference->avenue != "" && $conference->avenue != " " && $conference->avenue != "  ")
                    {{ $conference->avenue }},
                @endif  
                {{ $conference->province_table->name }}, {{ date('F d,Y', strtotime($conference->date)) }}</p>

                <h1 class="display-1">Details</h1>
                <p class="lead">
                    {!! $conference->details !!}
                </p>
            </div>
        </div>
        @include('partials.display_all_types_of_parent_category_files', ['object' => $conference])

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
