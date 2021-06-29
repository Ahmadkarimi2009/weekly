@extends('layouts.app')
@section('content')
    <div class="m-5">
        @include('partials.filters')
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
