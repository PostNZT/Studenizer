@extends('layout.master')

@section('title')
  Studenizer | Categorize Students
@endsection

@section('content')

  @if(Session::has('message'))
    @include('includes.message_warnings_notice_layout.message_failed')
  @endif

  <center>
    <h4 id="promotional-title"><b>Studenizer</b></h4>
    <p class="text-muted" id="promotional-desc"><b>Organize, Manage and Access Student Statistics</b></p>
  </center>

  @include('includes.forms.login_form')

@endsection
