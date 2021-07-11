@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('specific_report') }}" method="post" id="specific_report_form">
        @csrf
        <div class="row">
            <div class="col-12">
                <h1>Custom Filteration</h1>
            </div>
            <div class="col-sm-3">
                <div class="form-group pt-3">
                    <label for="years_select_box">List of Years</label>
                    <select class="form-control form-control-lg multi_select" id="multiselect" name="year[]"  aria-label="Select Years Select Box" multiple>
                        <option value="all">All</option>
                        @foreach ($years as $year)
                            <option value="{{ $year }}"
                            @if (isset($old) && $old->year == $year)
                                selected="selected"
                            @elseif (!isset($old) && $year == date('Y'))
                                selected="selected"
                            @endif
                            >
                            {{ $year}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group pt-3">
                    <label for="months_select_box">List of Months</label>
                    <select class="form-control form-control-lg" name="month[]" id="months_select_box" aria-label="Select Month Select Box" multiple>
                        <option value="all">All</option>
                        @foreach ($months as $month)
                            <option value="{{ $month }}" >{{ $month}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group pt-3">
                    <label for="weeks_select_box">List of Weeks</label>
                    <select class="form-control form-control-lg" name="week[]" id="weeks_select_box" aria-label="Select Week Select Box" multiple>
                        <option value="all">All</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3" >3</option>
                        <option value="4" >4</option>
                        <option value="5" >5</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group pt-3">
                  <label for="province_select_box">Works with selects</label>
                  <select class="form-control form-control-lg" name="province[]" id="province_select_box" aria-label="Select Province Select Box" multiple>
                    <option selected value="all">All</option>
                    @foreach ($provinces as $province)
                      <option value="{{ $province->id }}"
                        @if (isset($old) && $old->province == $province->id)
                            selected="selected"
                        @endif
                      >{{ $province->name}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="col-sm-12" id="event_type_select_box_container">
                <div class="form-group pt-3">
                  <label for="event_type_select_box">Activity Type</label>
                  <select class="form-control form-control-lg" name="event_type[]" id="event_type_select_box" aria-label="Select The Activity Type" multiple>
                    <option selected value="all">All</option>
                    @foreach ($event_types as $event_type)
                      <option value="{{ $event_type->id }}"
                        @if (isset($old) && $old->event_type_id == $event_type->id)
                            selected="selected"
                        @endif
                      >{{ $event_type->name}}</option>
                    @endforeach
                  </select>
                </div>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-success w-100 specific_report_btns" data-route="{{ route('specific_report') }}">Interactive Report</button>
            </div>
            <div class="col-6">
                <button type="button" class="btn btn-success w-100 specific_report_btns" data-route="{{ route('readonly_report') }}">View & Print Only</button>
            </div>
        </div>
    </form>

    <hr>
    <div class="row">
        <div class="accordion w-100" id="accordionExample">
            <h1>Activities</h1>
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
@section('js-scripts')
    <script>
        $(document).ready(function(){
            $('.specific_report_btns').on('click', function(){
                $('#specific_report_form').attr('action', $(this).data('route')).submit();

            });
        });
    </script>
@endsection
