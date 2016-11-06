@extends('layout.master')

@section('title')
   Studenizer | Student
@endsection

@section('content')
  <div class="container">
    <div class="row">
       <h4 class="top-page-title">
        <span class="glyphicon glyphicon-user"></span>
        Students | <a href="{{ route('add_student') }}" class="btn btn-sm btn-info"><span class="glyphicon glyphicon-plus"></span> Add</a> |
        <a href="{{ route('view_all_student') }}" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-eye-open"></span> All Students</a>
      </h4>
      <hr>
      <form class="form form-horizontal" role="search">
         <div class="input-group">
             <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
             <div class="input-group-btn">
                 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
             </div>
         </div>
       </form>
    </div><br>
    <div class="row">
        @include('components.tables.student_table')
    </div>
  </div>
@endsection
