@extends('layouts.app')
@section('css-libs')
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="{{ asset('/css/staff_profiles_list.css') }}" rel="stylesheet">
@endsection
@section('content')
    <div class="container mt-5">
        <div class="row">
            @foreach ($staff as $member)
                {{-- <div class="card testimonial_card">
                    <div class="text-center bg-light car_image_holder">
                        <img src="{{ asset($member->profile_pic) }}" class="card-img-top h-100 rounded-circle" alt="{{ $member->name }}">
                    </div>
                    <div class="card-body">
                        <h3>{{ $member->ipso_id }}</h3>
                        <h5 class="card-title">{{ $member->name }}</h5>
                        <h6 class="card-title">{{ $member->father_name }}</h6>
                        <span class="badge badge-primary">{{ $member->province}}, {{ $member->district}}</span>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('staff.edit', $member->id) }}" class="btn btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3.38 8A9.502 9.502 0 0112 2.5a9.502 9.502 0 019.215 7.182.75.75 0 101.456-.364C21.473 4.539 17.15 1 12 1a10.995 10.995 0 00-9.5 5.452V4.75a.75.75 0 00-1.5 0V8.5a1 1 0 001 1h3.75a.75.75 0 000-1.5H3.38zm-.595 6.318a.75.75 0 00-1.455.364C2.527 19.461 6.85 23 12 23c4.052 0 7.592-2.191 9.5-5.451v1.701a.75.75 0 001.5 0V15.5a1 1 0 00-1-1h-3.75a.75.75 0 000 1.5h2.37A9.502 9.502 0 0112 21.5c-4.446 0-8.181-3.055-9.215-7.182z"></path></svg>
                        </a>
                        <form action="{{ route('staff.destroy', $member->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn text-danger btn-sm delete_forms">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M16 1.75V3h5.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75zm-6.5 0a.25.25 0 01.25-.25h4.5a.25.25 0 01.25.25V3h-5V1.75z"></path><path d="M4.997 6.178a.75.75 0 10-1.493.144L4.916 20.92a1.75 1.75 0 001.742 1.58h10.684a1.75 1.75 0 001.742-1.581l1.413-14.597a.75.75 0 00-1.494-.144l-1.412 14.596a.25.25 0 01-.249.226H6.658a.25.25 0 01-.249-.226L4.997 6.178z"></path><path d="M9.206 7.501a.75.75 0 01.793.705l.5 8.5A.75.75 0 119 16.794l-.5-8.5a.75.75 0 01.705-.793zm6.293.793A.75.75 0 1014 8.206l-.5 8.5a.75.75 0 001.498.088l.5-8.5z"></path></svg>
                            </button>
                        </form>
                    </div>
                </div> --}}

                <div class="col-md-4">
                    <div class="card user-card">
                        <div class="card-block">
                            <div class="user-image">
                                <img src="{{ asset($member->profile_pic) }}" class="img-radius" alt="User-Profile-Image">
                            </div>
                            <h6 class="f-w-600 m-t-25 m-b-10">{{ $member->name }}</h6>
                            <p class="text-muted">{{ $member->position }}</p>
                            <hr>
                            <a href="{{ route('staff.show', $member->id) }}" class="btn btn-outline-success text-success">View Profile</a>
                            <div class="bg-c-blue counter-block m-t-10 p-20">
                                <div class="row">
                                    <div class="col-4">
                                        <i class="fa fa-comment"></i>
                                        <p>{{ $member->province }}</p>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-user"></i>
                                        <p>{{ $member->district }}</p>
                                    </div>
                                    <div class="col-4">
                                        <i class="fa fa-suitcase"></i>
                                        <p>{{ $member->address }}</p>
                                    </div>
                                </div>
                            </div>
                            <p class="text-muted mt-3">{{ $member->gender }} | {{ $member->date_of_employment }}</p>

                            {{-- <p class="m-t-15 text-muted">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <hr>
                            <div class="row justify-content-center user-social-link">
                                <div class="col-auto"><a href="#!"><i class="fa fa-facebook text-facebook"></i></a></div>
                                <div class="col-auto"><a href="#!"><i class="fa fa-twitter text-twitter"></i></a></div>
                                <div class="col-auto"><a href="#!"><i class="fa fa-dribbble text-dribbble"></i></a></div>
                            </div> --}}
                        </div>
                    </div>
                </div>          
            @endforeach
        </div>
    </div>
@endsection

@section('js-scripts')
    {{-- <script src="{{ asset('/js/testimonials.js') }}"></script> --}}
@endsection
