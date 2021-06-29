@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        @include('partials.filters')
    </div>
    <div class="container-fluid mt-5">
        <div class="row">
            @foreach ($reports as $report)
                @if (gettype($report->images) == 'array')
                    @foreach ($report->images as $image)
                        <div class="col-4 mt-5 card border-0 text-white">
                            <img src="{{ $image }}" class="card-img" alt="...">
                            <div class="card-img-overlay">
                                <h5 class="card-title"><span class="badge badge-dark">{{ $report->province_table->name }}</span></h5>
                                <p class="card-text badge badge-info">{{ $report->month }}</p>
                                <p class="card-text badge badge-info"> Week: {{ $report->week }}</p>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
@endsection