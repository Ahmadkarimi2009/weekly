@extends('layouts.app')
@section('content')
    <div class="container">
        <h1 class="mt-5 text-success display-1">Conferences</h1>
        <hr class="border-success">
        <input type="text" class="form-control search_bars mt-5 border-0" placeholder="Search...">
        <div class="card-columns mt-5">
            @foreach ($conferences as $conf)
                <div class="card conferences_card mt-5">
                    <div class="card-header text-white bg-success conferences_card_header">
                        <h5>{{ $conf->title }}</h5>
                    </div>
                    <div class="card-body">
                        <span class="badge badge-success">{{ $conf->date}}</span>
                        @if ($conf->avenue != "" && $conf->avenue != " " && $conf->avenue != "  ")
                            <span class="badge badge-success">{{ $conf->avenue}}</span>
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('conference.show', $conf->id) }}">View More...</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('js-scripts')
    {{-- <script src="{{ asset('/js/testimonials.js') }}"></script> --}}
@endsection
