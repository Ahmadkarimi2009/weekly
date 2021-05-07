<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('/css/bootstrap.css') }}" rel="stylesheet">

    <title>Reports</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="row">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Province</th>
                        <th scope="col">Topic</th>
                        <th scope="col">No. Male</th>
                        <th scope="col">No. Female</th>
                        <th scope="col">Total</th>
                        <th scope="col">Indirect Benificiaries</th>
                        <th scope="col">Week</th>
                        <th scope="col">Month</th>
                        <th scope="col">Year</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                    <tr>
                        <th>{{ $report->id }}</th>
                        <td>
                            @foreach ($provinces as $province)
                                @if ($province->id == $report->province)
                                    {{ $province->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>
                            @foreach ($topics as $topic)
                                @if ($topic->id == $report->topic)
                                    {{ $topic->name }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $report->number_of_male }}</td>
                        <td>{{ $report->number_of_female }}</td>
                        <td>{{ $report->number_of_male + $report->number_of_female }}</td>
                        <td>{{ $report->indirect_benificiaries }}</td>
                        <td>{{ $report->week }}</td>
                        <td>{{ $report->month }}</td>
                        <td>{{ $report->year }}</td>
                        <td>
                            <button class="btn btn-success btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                            @if ($report->weekly_report_file)
                                <a href="{{ asset($report->weekly_report_file) }}" class="btn btn-warning">File</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="{{ asset('/js/bootstrap.js') }}"></script>
  </body>
</html>