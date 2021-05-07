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
            <form action="{{ $route }}" method="POST" class="row g-3" enctype="multipart/form-data">
              @method($method)
              @csrf
              <div class="col-sm-12">
                <div class="form-floating">
                  <select class="form-select" name="province" id="province_select_box" aria-label="Select Province Select Box" required>
                    <option selected value="">Select Province</option>
                    @foreach ($provinces as $province)
                      <option value="{{ $province->id }}"
                        @if (isset($old) && $old->province == $province->id)
                            selected="selected"
                        @endif
                      >{{ $province->name}}</option>
                    @endforeach
                  </select>
                  <label for="province_select_box">Works with selects</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <select class="form-select" name="topic" id="topics_select_box" aria-label="Select Topics Select Box" required>
                      <option value="">Select Topic</option>
                      @foreach ($topics as $topic)
                        <option value="{{ $topic->id }}"
                          @if (isset($old) && $old->topic == $topic->id)
                            selected="selected"
                          @endif
                        >{{ $topic->name}}</option>
                      @endforeach
                    </select>
                  <label for="topics_select_box">List of Topics</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <select class="form-select" name="year" id="years_select_box" aria-label="Select Years Select Box" required>
                      <option value="">Select Year</option>
                      @foreach ($years as $year)
                        <option value="{{ $year }}"
                          @if (isset($old) && $old->year == $year)
                            selected="selected"
                          @elseif (!isset($old) && $year == date('Y'))
                              selected="selected"
                          @endif
                        >{{ $year}}</option>
                      @endforeach
                  </select>
                  <label for="years_select_box">List of Years</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <select class="form-select" name="month" id="months_select_box" aria-label="Select Month Select Box" required>
                      <option value="">Select Month</option>
                      @foreach ($months as $month)
                        <option value="{{ $month }}"
                          @if (isset($old) && $old->month == $month)
                            selected="selected"
                          @elseif (!isset($old) && $month == date('F'))
                              selected="selected"
                          @endif
                        >{{ $month}}</option>
                      @endforeach
                  </select>
                  <label for="months_select_box">List of Months</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <select class="form-select" name="week" id="weeks_select_box" aria-label="Select Week Select Box" required>
                      <option value="">Select Week</option>
                      <option value="1"
                        @if (isset($old) && $old->year == 1)
                            selected="selected"
                        @endif
                      >1</option>
                      <option value="2"
                        @if (isset($old) && $old->week == 2)
                            selected="selected"
                        @endif
                      >2</option>
                      <option value="3"
                        @if (isset($old) && $old->week == 3)
                            selected="selected"
                        @endif
                      >3</option>
                      <option value="4"
                        @if (isset($old) && $old->week == 4)
                            selected="selected"
                        @endif
                      >4</option>
                  </select>
                  <label for="weeks_select_box">List of Months</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <input type="number" class="form-control mw_totals"
                    @if (isset($old))
                      value="{{ $old->number_of_male }}"
                    @endif
                  name="male" id="total_number_of_men" placeholder="123" required>
                  <label for="total_number_of_men">Total Number of Men</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <input type="number" class="form-control mw_totals"
                    @if (isset($old))
                      value="{{ $old->number_of_female }}"
                    @endif
                  name="female" id="total_number_of_women" placeholder="123" required>
                  <label for="total_number_of_women">Total Number of Women</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <input type="number" class="form-control"
                    @if (isset($old))
                      value="{{ $old->number_of_female + $old->number_of_male }}"
                    @endif
                  name="total" id="total_number_of_men_women" placeholder="123" readonly required>
                  <label for="total_number_of_men_women">Total</label>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-floating">
                  <input type="number" class="form-control"
                    @if (isset($old))
                      value="{{ $old->indirect_benificiaries }}"
                    @endif
                  name="benificiaries" id="total_number_of_benificiaries" placeholder="123" readonly required>
                  <label for="total_number_of_benificiaries">Number of benificiaries</label>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="border rounded p-3">
                  <label for="original_weekly_report_file">Original weekly report file</label>
                  <input type="file" class="form-control border-0 mt-2 ps-3" name="weekly_report" id="original_weekly_report_file" placeholder="123">
                </div>
              </div>
              <div class="col-sm-12">
                <div class="d-grid gap-2">
                  <button type="submit" class="btn btn-success btn-lg">Save</button>
                </div>
              </div>
            </form>
        </div>
    </div>
    
    <script src="{{ asset('/js/bootstrap.js') }}"></script>
    <script src="{{ asset('/js/forms.js') }}"></script>
  </body>
</html>
