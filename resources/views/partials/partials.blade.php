
<div class="d-none print_this">
    <h1 class="text-success">Ipso</h1>
    <strong>Container Project, Afghanistan</strong>
    <p>Strengthening of Psychosocial competence and Resilience</p>
</div>
<div class="alert alert-info do_not_print">
    <strong>Reporting factors</strong>
    <br>
    Year:
    @if (isset($filter_params['year']))
        @foreach ($filter_params['year'] as $year)
            <span class="badge badge-primary">{{ $year }}</span>
        @endforeach
    @else
        <span class="badge badge-primary">All</span>
    @endif

    <br>
    Month:
    @if (isset($filter_params['month']))
        @foreach ($filter_params['month'] as $month)
            <span class="badge badge-primary">{{ $month }}</span>
        @endforeach
    @else
        <span class="badge badge-primary">All</span>
    @endif

    <br>
    Week:
    @if (isset($filter_params['week']))
        @foreach ($filter_params['week'] as $week)
            <span class="badge badge-primary">{{ $week }}</span>
        @endforeach
    @else
        <span class="badge badge-primary">All</span>
    @endif

    <br>
    Province:
    @if (isset($filter_params['province']))
        @foreach ($filter_params['province'] as $province)
            <span class="badge badge-primary">{{ $province }}</span>
        @endforeach
    @else
        <span class="badge badge-primary">All</span>
    @endif

    <br>
    Event Type:
    @if (isset($filter_params['event_type']))
        @foreach ($filter_params['event_type'] as $event_type)
            <span class="badge badge-primary">{{ $event_type }}</span>
        @endforeach
    @else
        <span class="badge badge-primary">All</span>
    @endif
</div>