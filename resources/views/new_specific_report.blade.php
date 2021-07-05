@extends('layouts.app')
@section('content')
    <div class="m-5">

        <div id="statistics_section" class="row pl-2 pr-2">

        </div>
        @if(count($new_reports) == 0)
            <h1>No Records found based on the current filters</h1>
        @elseif ($new_reports != "empty")
            @foreach ($event_types as $activity)
                <h5 class="text-success mt-5">{{ $activity->name }}</h5>
                <table class="table table-bordered">
                    <thead class="bg-dark text-light">
                        <tr>
                            <th scope="col">Province</th>
                            @foreach ($activity->fields as $activity_field)
                                @foreach ($fields as $field)
                                    @if ($field['display_in_specific_report'] == 'true')
                                        @if ($field['id'] == $activity_field)
                                            <th scope="col" class="">{{ $field['name'] }}</th>
                                        @endif
                                    @endif
                                @endforeach
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $activity_id = $activity->id;
                            $extracted_report  = array_filter($new_reports, function($key) use ($activity_id){
                                return $key == $activity_id;
                            }, ARRAY_FILTER_USE_KEY);
                            $extracted_report = array_shift($extracted_report);
                        @endphp

                        @if ($extracted_report != null)
                            @foreach ($extracted_report as $province_id => $province_record)
                                <tr>
                                    <td>{{ $province_id }}</td>
                                    @foreach ($activity->fields as $activity_field)
                                        @foreach ($fields as $field)
                                            @if ($field['display_in_specific_report'] == 'true')
                                                @if ($field['id'] == $activity_field)
                                                    <td>{{ $province_record[$field['machine_name']] }}</td>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endforeach
                                </tr>
                            @endforeach
                        @endif
                       
                    </tbody>
                </table>
            @endforeach
        @endif
    </div>
@endsection

@section('js-scripts')
    <script src="{{ asset('/js/snippet.js') }}"></script>
@endsection
