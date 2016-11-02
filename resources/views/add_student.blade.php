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
  <h4 class="top-page-title">Add Student</h4>
  <hr>
  @include('includes.forms.add_student')

@endsection
