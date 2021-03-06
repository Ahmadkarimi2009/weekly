@extends('layouts.app')
@section('content')
    <div class="bg-info p-5 ">
        <div class="container d-flex">
            <div class="mr-4 align-self-stretch">
                <img src="{{ asset($staff->profile_pic) }}" class="single_staff_profile_pic h-100" alt="No Profile Pic Available">
            </div>
            <div class="text-light align-self-stretch">
                <h4>{{ $staff->name }}</h4>
                <h6>
                    <strong>
                        {{ $staff->position }}
                    </strong>
                </h6>
            </div>
        </div>
    </div>

    <div class="container">
        @include('partials.display_all_types_of_parent_category_files', ['object' => $staff])
    </div>
@endsection

@section('js-scripts')
    {{-- <script src="{{ asset('/js/testimonials.js') }}"></script> --}}
@endsection
