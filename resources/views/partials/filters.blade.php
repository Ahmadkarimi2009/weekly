<h3 class="mt-5">Provinces</h3>
<button class="btn btn-success filter_province all_provinces" data-name="all_provinces">All</button>
@foreach ($provinces as $province)
    <button class="btn btn-outline-success filter_province each_province" data-name="{{ $province->name }}">{{ $province->name }}</button>
@endforeach

<h3 class="mt-5">Years</h3>
<button class="btn btn-success filter_province">All</button>
@foreach ($years as $year)
    <button class="btn btn-outline-success filter_province">{{ $year }}</button>
@endforeach

<h3 class="mt-5">Month</h3>
<button class="btn btn-success filter_province">All</button>
@foreach ($months as $month)
    <button class="btn btn-outline-success filter_province">{{ $month }}</button>
@endforeach

<h3 class="mt-5">Week</h3>
<button class="btn btn-success filter_province">All</button>
<button class="btn btn-outline-success filter_province">1</button>
<button class="btn btn-outline-success filter_province">2</button>
<button class="btn btn-outline-success filter_province">3</button>
<button class="btn btn-outline-success filter_province">4</button>
<button class="btn btn-outline-success filter_province">5</button>
