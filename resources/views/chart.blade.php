
@extends('layout.master')

@section('title')
  Studenizer | Chart
@endsection

@section('extrajs')
    <script type="text/javascript" src="{{ asset('asset/js/chart.min.js') }}"></script>
@endsection

@section('content')
  <script>
    var options =  {

          responsive: true,
          scales: {
               yAxes: [{
                   ticks: {
                       beginAtZero:true
                   }
               }]
           },

           legend: {
            display: false
          },

          tooltips: {
            callbacks: {
               label: function(tooltipItem) {
                      return tooltipItem.yLabel;
               }
            }
          }

    };
  </script>

  @if(Request::url() == route('chart_page_population'))
    @include('components.charts.population_chart')
  @elseif(Request::url() == route('chart_page_program_cluster'))
    @include('components.charts.program_cluster')
  @endif

@endsection
