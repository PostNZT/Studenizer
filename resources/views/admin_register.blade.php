@extends('layout.master')

@section('title')
  Studenizer | Admin Register
@endsection

@section('extracss')
  <link rel="stylesheet" href="{{ asset('asset/css/bootstrap-datetimepicker.min.css')}}" media="screen" title="no title" charset="utf-8">
@endsection

@section('extrajs')
  <script src="{{ asset('asset/js/bootstrap-datetimepicker.min.js') }}"></script>
@endsection

@section('content')
  @include('includes.forms.admin_register_form')
@endsection
