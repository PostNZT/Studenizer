<!DOCTYPE html>
<html>

    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" media="screen,projection"/>
    </head>

    <body>
      @include('navbar')
      <div class="container">

      </div>

    </body>


      <script type="text/javascript" src="{{ asset('assets/js/jquery-3.1.1.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</html>
