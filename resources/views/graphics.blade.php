@extends('layouts.app')
@section('css-libs')
@endsection

@section('content')
    <div class="container">
        @include('partials/partials')
    </div>
    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-sm-9">
                <canvas id="myChart"></canvas>
            </div>

            <div class="col-sm-3">
                <canvas id="myChart_doughnut"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('js-scripts')

  <script>
    var total_number_of_women_per_activity = @json($total_number_of_women_per_activity);
    var total_number_of_men_per_activity = @json($total_number_of_men_per_activity);
    var total_in_all_activities = @json($total_in_all_activities);

    var total_number_of_women_per_activity_array = Object.keys(total_number_of_women_per_activity).map(function(k) { return total_number_of_women_per_activity[k] });
    var total_number_of_men_per_activity_array = Object.keys(total_number_of_men_per_activity).map(function(k) { return total_number_of_men_per_activity[k] });

  </script>

  <script src="{{ asset('js/chartjs/chartjs.min.js') }}"></script>
<script>

    const labels = @json($labels);
    const data = {
        labels: labels,
        datasets: [
            {
                label: 'Total of Women',
                data: total_number_of_women_per_activity_array,
                borderColor: '#52b788',
                backgroundColor: '#52b788',
            },
            {
                label: 'Total of Men',
                data: total_number_of_men_per_activity_array,
                borderColor: '#b7e4c7',
                backgroundColor: '#b7e4c7',
            }
        ]
    };
    const config = {
        type: 'bar',
        data,
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Each individual activity'
                },
            },
            responsive: true,
            scales: {
                x: {
                    stacked: true,
                },
                y: {
                    stacked: true
                }
            },
            maintainAspectRatio: false,
        }
    };

    var myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    const data_doughnut = {
        labels: ['Men', 'Women'],
        datasets: [
            {
                label: 'Dataset 1',
                data: total_in_all_activities,
                backgroundColor: ['#00afb9', '#eee'],
            }
        ]
    };

    const config_doughnut = {
        type: 'doughnut',
        data: data_doughnut,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'All activities'
                }
            }
        },
    };

    var myChart_doughnut = new Chart(
        document.getElementById('myChart_doughnut'),
        config_doughnut
    );
</script>
@endsection
