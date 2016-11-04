

<form class="form form-horizontal form-login" action="{{ route('admin_register_post') }}" method="post">
  <h4>Register Admin User</h4><br>
  <label for="username">Username</label>
  <input class="form-control"type="text" name="username" /><br>
  <label for="password">Password</label>
  <input class="form-control" type="password" name="password" /><br>
  <input class="btn btn-info btn-md form-control" type="submit" name="name" value="SignUp" />
  <input type="hidden" name="_token" value="{{ Session::token() }}">
</form>
