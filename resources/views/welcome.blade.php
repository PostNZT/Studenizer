@extends('layout.master')

@section('title')
  Studenizer | Categorize Students
@endsection


@section('content')
  <center>
    <h4 id="promotional-title"><b>Studenizer</b></h4>
    <p class="text-muted" id="promotional-desc"><b>Organize, Manage and Access Student Statistics</b></p>
  </center>
  @include('includes.forms.login_form')
@endsection
