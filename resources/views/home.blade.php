@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="accordion w-100" id="accordionExample">
            <h1>Home</h1>
            @foreach ($event_types as $event)
                <div class="card">
                    <div class="card-header" id="event_{{$event->id}}">
                        <h2 class="mb-0">
                            <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#event_body{{ $event->id }}" aria-expanded="false" aria-controls="event_body{{ $event->id }}">
                                {{ $event->name }}
                            </button>
                        </h2>
                    </div>
                    <div id="event_body{{ $event->id }}" class="collapse" aria-labelledby="event_{{$event->id}}" data-parent="#accordionExample">
                        <div class="card-body">
                            @foreach ($provinces as $province)
                                <a href="{{ route('activities.province', ['province_id' => $province->id, 'event_type_id' => $event->id]) }}" class="btn btn-outline-primary">{{ $province->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>    
</div>
@endsection
