@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        @include('partials.filters')
    </div>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <h1>Weekly Report Images</h1>
            </div>
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

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-12">
                <h1>Other Images</h1>
            </div>
            @foreach ($images as $image)
                <div class="col-lg-2 col-sm-6 mt-5 card border-0 text-white">
                    <img src="{{ asset($image->path) }}" class="card-img" alt="...">
                    <div class="card-img-overlay">
                        @isset($image->province_id)
                            <h5 class="card-title d-inline-block"><span class="badge badge-dark">{{ $image->province->name }}</span></h5>
                        @endisset

                        <form action="{{ route('image.destroy', $image->id) }}" method="post" class="d-inline float-right">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn text-danger btn-sm delete_forms bg-light rounded">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M16 1.75V3h5.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75zm-6.5 0a.25.25 0 01.25-.25h4.5a.25.25 0 01.25.25V3h-5V1.75z"></path><path d="M4.997 6.178a.75.75 0 10-1.493.144L4.916 20.92a1.75 1.75 0 001.742 1.58h10.684a1.75 1.75 0 001.742-1.581l1.413-14.597a.75.75 0 00-1.494-.144l-1.412 14.596a.25.25 0 01-.249.226H6.658a.25.25 0 01-.249-.226L4.997 6.178z"></path><path d="M9.206 7.501a.75.75 0 01.793.705l.5 8.5A.75.75 0 119 16.794l-.5-8.5a.75.75 0 01.705-.793zm6.293.793A.75.75 0 1014 8.206l-.5 8.5a.75.75 0 001.498.088l.5-8.5z"></path></svg>
                            </button>
                        </form>

                        <br>

                        @isset($image->category_id)
                            <p class="card-text badge badge-info">{{ $image->category->name }}</p>
                        @endisset

                        @isset($image->year)
                            <p class="card-text badge badge-info">{{ $image->year }}</p>
                        @endisset
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection