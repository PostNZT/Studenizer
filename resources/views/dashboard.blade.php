@extends('layout.master')

@section('title')
  Studenizer | Dashboard
@endsection

@section('extrajs')
  <script type="text/javascript" src="{{ asset('asset/js/chart.min.js') }}"></script>
  <script src="{{ asset('asset/js/helpers/helper.js') }}"></script>
  <script src="{{ asset('asset/js/components/json_renderer.js') }}"></script>
@endsection

@section('content')
    <h4>Dashboard</h4>
    <hr>
    <div class="row">
        <div class="col-md-3">
          <div class="panel panel-default">
              @include('includes.panels.left_panel')
          </div>
        </div>
        <div class="col-md-9">
              @include('components.tables.data_summary')
        </div>
    </div>
@endsection
