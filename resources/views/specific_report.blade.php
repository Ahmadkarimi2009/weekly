@extends('layouts.app')
@section('content')
    <div class="m-5">
        {{-- <div class="alert alert-success" role="alert">
            <div>{{ $event_type->name }} -> {{ $province }}</div>
        </div> --}}

        @include('partials/partials')
        
        <div id="statistics_section" class="row pl-2 pr-2">

        </div>


        @if(count($reports) == 0)
            <h1>No Records found based on the current filters</h1>
        @elseif ($reports != "empty")
            @foreach ($event_types as $event)
                <div class="mt-5" role="alert">
                    <h2 class="">{{ $event->name }}</h2>
                </div>
                <table class="table table-bordered" id="specific_report_table_{{$event->id}}">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="column_id">#</th>
                            <th scope="col" class="column_province">Province</th>
                            <th scope="col" class="column_week">Week</th>
                            <th scope="col" class="column_month">Month</th>
                            <th scope="col" class="column_year">Year</th>
                            @foreach ($event->fields as $event_field)
                                @foreach ($fields as $field)
                                    @if ($field->id == $event_field)
                                        <th scope="col" class="{{ $field->machine_name}}">{{ $field->name }}</th>
                                    @endif
                                @endforeach
                            @endforeach
                            <th scope="col" class="do_not_print">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                            @if ($report->event_type_id == $event->id)
                                <tr>
                                    <th class="column_id">{{ $report->id }}</th>
                                    <td class="column_province">
                                        @foreach ($provinces as $province)
                                            @if ($province->id == $report->province)
                                                {{ $province->name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="column_week">{{ $report->week }}</td>
                                    <td class="column_month">{{ $report->month }}</td>
                                    <td class="column_year">{{ $report->year }}</td>
                                    @foreach ($event->fields as $event_field)
                                        @foreach ($fields as $field)
                                            @if ($field->id == $event_field)
                                                @if (isset($report->json_data[$field->machine_name]))
                                                    <td class="{{ $field->machine_name }} {{ $report->province_table->name }}">{{ $report->json_data[$field->machine_name] }}</td>
                                                @else
                                                    <td></td>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endforeach
                    
                                    <td class="do_not_print">
                                        <a href="{{ route('report.edit', $report->id) }}" class="btn btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path d="M3.38 8A9.502 9.502 0 0112 2.5a9.502 9.502 0 019.215 7.182.75.75 0 101.456-.364C21.473 4.539 17.15 1 12 1a10.995 10.995 0 00-9.5 5.452V4.75a.75.75 0 00-1.5 0V8.5a1 1 0 001 1h3.75a.75.75 0 000-1.5H3.38zm-.595 6.318a.75.75 0 00-1.455.364C2.527 19.461 6.85 23 12 23c4.052 0 7.592-2.191 9.5-5.451v1.701a.75.75 0 001.5 0V15.5a1 1 0 00-1-1h-3.75a.75.75 0 000 1.5h2.37A9.502 9.502 0 0112 21.5c-4.446 0-8.181-3.055-9.215-7.182z"></path></svg>
                                        </a>
                                        <form action="{{ route('report.destroy', $report->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm delete_forms">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M16 1.75V3h5.25a.75.75 0 010 1.5H2.75a.75.75 0 010-1.5H8V1.75C8 .784 8.784 0 9.75 0h4.5C15.216 0 16 .784 16 1.75zm-6.5 0a.25.25 0 01.25-.25h4.5a.25.25 0 01.25.25V3h-5V1.75z"></path><path d="M4.997 6.178a.75.75 0 10-1.493.144L4.916 20.92a1.75 1.75 0 001.742 1.58h10.684a1.75 1.75 0 001.742-1.581l1.413-14.597a.75.75 0 00-1.494-.144l-1.412 14.596a.25.25 0 01-.249.226H6.658a.25.25 0 01-.249-.226L4.997 6.178z"></path><path d="M9.206 7.501a.75.75 0 01.793.705l.5 8.5A.75.75 0 119 16.794l-.5-8.5a.75.75 0 01.705-.793zm6.293.793A.75.75 0 1014 8.206l-.5 8.5a.75.75 0 001.498.088l.5-8.5z"></path></svg>
                                            </button>
                                        </form>
                                        @if (isset($report->weekly_report_file))
                                            <a href="{{ asset($report->weekly_report_file) }}" class="btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill-rule="evenodd" d="M5 2.5a.5.5 0 00-.5.5v18a.5.5 0 00.5.5h14a.5.5 0 00.5-.5V8.5h-4a2 2 0 01-2-2v-4H5zm10 0v4a.5.5 0 00.5.5h4a.5.5 0 00-.146-.336l-4.018-4.018A.5.5 0 0015 2.5zM3 3a2 2 0 012-2h9.982a2 2 0 011.414.586l4.018 4.018A2 2 0 0121 7.018V21a2 2 0 01-2 2H5a2 2 0 01-2-2V3z"></path></svg>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                    <tfoot class="do_not_print">
                        <tr>
                        
                        </tr>
                    </tfoot>
                </table>
            @endforeach
        @endif

    </div>
@endsection

@section('js-scripts')
    <script src="{{ asset('/js/specific_reports.js') }}"></script>
    <script src="{{ asset('/js/datatable/datatable_buttons.js') }}"></script>
    <script src="{{ asset('/js/datatable/jszip.js') }}"></script>
    <script src="{{ asset('/js/datatable/pdfmake.js') }}"></script>
    <script src="{{ asset('/js/datatable/vfs_fonts.js') }}"></script>
    <script src="{{ asset('/js/datatable/html5_buttons.js') }}"></script>
    <script src="{{ asset('/js/datatable/print_button.js') }}"></script>
    <script src="{{ asset('/js/datatable/colvis.js') }}"></script>
    <script>
        var fields = {!! $fields !!};
        var event_types = {!! $event_types !!}
        var provinces = {!! $provinces !!};
        var months = {!! json_encode($months) !!};
        var years = {!! json_encode($years) !!};

    </script>
@endsection
