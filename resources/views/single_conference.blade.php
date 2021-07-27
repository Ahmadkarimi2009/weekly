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
        @foreach ($parent_categories as $cat)
            <div class="row">
                <div class="col-12">
                    <div class="display-2 font-italic">{{ $cat->name }}</div>
                </div>
                @if ($conference->file_objects != null && !empty($conference->file_objects))
                    @foreach ($conference->file_objects as $file)
                        @if ($file->parent_category_id == $cat->id)
                            <div class="col-3">
                                <div class="card mou_file_cards">
                                    <div class="card-body">
                                        @if ($cat->name == 'images')
                                            <img src="{{ asset($file->path) }}" class="card-img" alt="{{ $file->name }}">
                                        @elseif($cat->name == 'videos')
                                        {{-- <a href="{{ asset($file->path) }}" class="btn" target="_blank">
                                            <svg xmlns="http://www.w3.org/2000/svg"class="w-100 h-100" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-3 17v-10l9 5.146-9 4.854z"/></svg>
                                        </a> --}}

                                        <video width="320" height="240" controls>
                                            <source src="{{ asset($file->path) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                        
                                        @else
                                            <a href="{{ asset($file->path) }}" class="btn" target="_blank">
                                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" class="w-100 h-100">
                                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                                    <polyline points="14 2 14 8 20 8"/>
                                                    <line x1="16" x2="8" y1="13" y2="13"/>
                                                    <line x1="16" x2="8" y1="17" y2="17"/>
                                                    <polyline points="10 9 9 9 8 9"/>
                                                </svg>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="card-footer p-4 bg-transparent">
                                        <strong>
                                            <span class="badge badge-info">{!! substr($file->name,0,20).'...' !!}</span>
                                            <span class="badge badge-info">{{ $file->child_category->name }}</span>
                                        </strong>
                                        <div class="float-right">
                                            <a href="{{ route('file.edit', $file->id) }}" class="btn btn-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3.38 8A9.502 9.502 0 0112 2.5a9.502 9.502 0 019.215 7.182.75.75 0 101.456-.364C21.473 4.539 17.15 1 12 1a10.995 10.995 0 00-9.5 5.452V4.75a.75.75 0 00-1.5 0V8.5a1 1 0 001 1h3.75a.75.75 0 000-1.5H3.38zm-.595 6.318a.75.75 0 00-1.455.364C2.527 19.461 6.85 23 12 23c4.052 0 7.592-2.191 9.5-5.451v1.701a.75.75 0 001.5 0V15.5a1 1 0 00-1-1h-3.75a.75.75 0 000 1.5h2.37A9.502 9.502 0 0112 21.5c-4.446 0-8.181-3.055-9.215-7.182z"></path></svg>
                                            </a>
                                            <form action="{{ route('file.destroy', $file->id) }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn text-danger btn-sm delete_forms">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M16 1.75V3h5.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75zm-6.5 0a.25.25 0 01.25-.25h4.5a.25.25 0 01.25.25V3h-5V1.75z"></path><path d="M4.997 6.178a.75.75 0 10-1.493.144L4.916 20.92a1.75 1.75 0 001.742 1.58h10.684a1.75 1.75 0 001.742-1.581l1.413-14.597a.75.75 0 00-1.494-.144l-1.412 14.596a.25.25 0 01-.249.226H6.658a.25.25 0 01-.249-.226L4.997 6.178z"></path><path d="M9.206 7.501a.75.75 0 01.793.705l.5 8.5A.75.75 0 119 16.794l-.5-8.5a.75.75 0 01.705-.793zm6.293.793A.75.75 0 1014 8.206l-.5 8.5a.75.75 0 001.498.088l.5-8.5z"></path></svg>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endif
            </div> 
            <hr>
        @endforeach

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
