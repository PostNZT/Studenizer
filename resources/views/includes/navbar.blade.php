<nav class="navbar navbar-default">

  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand logo" href="#">Studenizer</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active">
            <a href="{{ route('home_page') }}"><span class="glyphicon glyphicon-user"></span> Students<span class="sr-only">(current)</span></a>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-graph"></span> Charts <span class="caret"></span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="#">Population</a></li>
              <li><a href="#">Program Cluster CGPA</a></li>
              <li><a href="#">CGPA Categories Cluster</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left" method="post" action="">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="glyphicon glyphicon-king"></span> Admin <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">Dashboard</a></li>
              <li><a href="#">Logs</a></li>
              <li><a href="#">Profile</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
            </ul>
          </li>
        </ul>
    </div>

  </div>

</nav>
