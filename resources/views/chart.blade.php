
@extends('layout.master')

@section('title')
  Studenizer | Chart
@endsection

@section('extrajs')
    <script type="text/javascript" src="{{ asset('asset/js/chart.min.js') }}"></script>
    <script src="{{ asset('asset/js/helpers/helper.js') }}"></script>
    <script src="{{ asset('asset/js/components/json_renderer.js') }}"></script>
@endsection

@section('content')
  @if(Request::url() == route('chart_page_population'))
    @include('components.charts.population_chart')
  @elseif(Request::url() == route('chart_page_program_cluster'))
    @include('components.charts.program_cluster')
  @endif
@endsection
