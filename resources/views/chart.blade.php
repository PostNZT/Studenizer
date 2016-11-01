
@extends('layout.master')

@section('title')
  Studenizer | Chart
@endsection

@section('content')
  <script type="text/javascript" src="{{ asset('asset/js/chart.min.js') }}"></script>
  @if(Request::url() == route('chart_page_population'))
    @include('components.charts.population_chart')
  @elseif(Request::url() == route('chart_page_program_cluster'))
    <h4><b>Program Chart Report</b></h4>
  @endif

@endsection
