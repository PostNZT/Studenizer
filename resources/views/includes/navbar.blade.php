<nav class="navbar navbar-default">

  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand logo" href="{{ route('welcome_page') }}">Studenizer</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="{{ route('student_page') }}"><span class="glyphicon glyphicon-user"></span> Students<span class="sr-only">(current)</span></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-graph"></span> Charts <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="{{ route('chart_page_population') }}">Population</a></li>
              <li><a href="{{ route('chart_page_program_cluster') }}">Program Cluster CGPA</a></li>
              <li><a href="{{ route('chart_page_cgpa_cluster') }}">CGPA Categories Cluster</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
           @if(Auth::check())
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="glyphicon glyphicon-king"></span> {{ Auth::user()->username }} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="#">Dashboard</a></li>
                  <li><a href="#">Logs</a></li>
                  <li><a href="#">Profile</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="{{ route('logout') }}"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                </ul>
              </li>
            @else
                <li><a href="{{ route('welcome_page') }}"><span class="glyphicon glyphicon-lock"></span> Login</a></li>
            @endif
        </ul>
    </div>

  </div>

</nav>
