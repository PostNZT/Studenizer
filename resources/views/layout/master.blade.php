<!DOCTYPE html>

<html>

    <head>
        <title>@yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" media="screen,projection"/>
        <link rel="stylesheet" href="{{ asset('asset/css/override.css') }}" media="screen,projection">
    </head>

    <body>

      @include('includes.navbar')

      <div class="container master-container">
      @yield('content')
      </div>

      @include('includes.footer')

    </body>

      <script type="text/javascript" src="{{ asset('asset/js/jquery-3.1.1.min.js') }}"></script>
      <script type="text/javascript" src="{{ asset('asset/js/bootstrap.min.js') }}"></script>

</html>
