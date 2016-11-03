@extends('layout.master')

@section('title')
   Studenizer | Add Student
@endsection

@section('extracss')
  <link rel="stylesheet" href="{{ asset('asset/css/bootstrap-datetimepicker.min.css')}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('extrajs')
  <script src="{{ asset('asset/js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection

@section('content')
  <h4 class="top-page-title">Add Student
  | <a href="{{ route('add_student') }}" class="btn btn-sm btn-primary">Single Form</a>
  | <a href="{{ route('add_student_file') }}" class="btn btn-sm btn-success">Use CSV / XLS</a></h4>
  <hr>
  @if(Request::url() == route('add_student'))
    @include('includes.forms.add_student_form')
  @elseif(Request::url() == route('add_student_file'))
    @include('includes.forms.add_student_file_form')
  @endif
@endsection
