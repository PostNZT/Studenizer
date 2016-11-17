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
          <li @if(Request::url() == route('student_page')) class="active" @endif >
            <a href="{{ route('student_page') }}"><span class="glyphicon glyphicon-user"></span> Students</a>
          </li>
          <li
                  @if(Request::url() == route('chart_page_population')
                  ||  Request::url() == route('chart_page_program_cluster')
                  ||  Request::url() == route('chart_page_cgpa_cluster'))
                  class="dropdown active"
                  @else class="dropdown"
                  @endif
           >
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

                <li
                      @if(Request::url() == route('add_student')
                      || Request::url() == route('dashboard'))
                      class="dropdown active"
                      @else class="dropdown"
                      @endif
                >

                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="glyphicon glyphicon-king"></span> {{ Auth::user()->username }} <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="{{ route('dashboard') }}">
                    <span class="glyphicon glyphicon-dashboard"></span>
                    Dashboard</a></li>
                  <li>
                    <a href="{{ route('add_student') }}">
                      <span class="glyphicon glyphicon-plus-sign"></span>
                      Add Student
                    </a>
                  <li><a href="#">
                    <span class="glyphicon glyphicon-list"></span>
                    Logs</a></li>
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
