@extends('layout.master')

@section('title')
   Studenizer | Home
@endsection

@section('content')
  <div class="container">
    <div class="row">
       <h4 class="top-page-title">
        <span class="glyphicon glyphicon-user"></span>
        Students | <a href="#" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-plus"></span> Add</a>
      </h4>
      <hr>
      <input type="text" role="search" class="form-control" name="name" value="" placeholder="search a student"/>
    </div><br>
    <div class="row">
      @include('components.tables.student_table')
    </div>
  </div>
@endsection
