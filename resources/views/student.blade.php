@extends('layout.master')

@section('title')
   Studenizer | Student
@endsection

@section('content')
  <div class="container">
    <div class="row">
       <h4 class="top-page-title">
        <span class="glyphicon glyphicon-user"></span>
        Students | <a href="{{ route('view_all_student') }}" class="btn btn-sm btn-success"> View All</a>
      </h4>
      <hr>
      <form class="form form-horizontal" role="search" method="get" action="{{ route('student_search') }}">
         <div class="input-group">
             <input type="text" class="form-control" placeholder="Search" name="search_key" id="search_key" required="">
             <div class="input-group-btn">
                 <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
             </div>
         </div>
       </form>
    </div><br>
    <div class="row">

        @if(Request::url() == route('view_all_student') || Request::url() == route('student_search'))
            {{ $student->appends(['search_key' => Request::get('search_key')])->links() }}
            @include('components.tables.student_table')
            {{ $student->appends(['search_key' => Request::get('search_key')])->links() }}
        @else
            <center>
              <h4 class="muted-text-search text-muted">
                 Display student records by <b>"Searching"</b> or <br>pressing the <b>"All Students"</b> button.
              </h4>
            </center>
        @endif

    </div>
  </div>
@endsection
