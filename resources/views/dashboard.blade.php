@extends('layout.master')

@section('title')
  Studenizer | Dashboard
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
