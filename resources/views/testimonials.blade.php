@extends('layouts.app')
@section('content')
    <div class="m-5">
        <h3 class="mt-5">Provinces</h3>
        <button class="btn btn-success filter_province all_provinces" data-name="all_provinces">All</button>
        @foreach ($provinces as $province)
            <button class="btn btn-outline-success filter_province each_province" data-name="{{ $province->name }}">{{ $province->name }}</button>
        @endforeach

        <h3 class="mt-5">Years</h3>
        <button class="btn btn-success filter_province">All</button>
        @foreach ($years as $year)
            <button class="btn btn-outline-success filter_province">{{ $year }}</button>
        @endforeach

        <h3 class="mt-5">Month</h3>
        <button class="btn btn-success filter_province">All</button>
        @foreach ($months as $month)
            <button class="btn btn-outline-success filter_province">{{ $month }}</button>
        @endforeach

        <h3 class="mt-5">Week</h3>
        <button class="btn btn-success filter_province">All</button>
        <button class="btn btn-outline-success filter_province">1</button>
        <button class="btn btn-outline-success filter_province">2</button>
        <button class="btn btn-outline-success filter_province">3</button>
        <button class="btn btn-outline-success filter_province">4</button>
        <button class="btn btn-outline-success filter_province">5</button>

        <div class="card-columns mt-5">
            @foreach ($testimonials as $testimonial)
                <div class="card testimonial_card" data-province="{{ $testimonial->report->province_table->name }}">
                    <div class="text-center bg-light car_image_holder">
                        <img src="{{ asset($testimonial->image) }}" class="card-img-top h-100 rounded-circle" alt="{{ $testimonial->name }}">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $testimonial->name }}</h5>
                        <span class="badge badge-primary">{{ $testimonial->report->province_table->name}}</span>
                        <span class="badge badge-warning">{{ $testimonial->report->year}}</span>
                        <span class="badge badge-warning">{{ $testimonial->report->month}}</span>
                        <span class="badge badge-warning">Week {{ $testimonial->report->week}}</span>
                        <hr>
                        <p class="card-text">{{ $testimonial->testimonial }}</p>
                    </div>
                </div>            
            @endforeach
        </div>
    </div>
@endsection

@section('js-scripts')
    <script src="{{ asset('/js/testimonials.js') }}"></script>
@endsection
