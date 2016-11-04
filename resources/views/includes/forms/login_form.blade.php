
<form action="{{ route('signIn') }}"class="form form-horizontal form-login" method="post">
  <div class="form-group">
    <h2>Sign In</h2><hr>
    <label for="username"><b>Username</b></label>
    <input type="text" class="form-control" name="username" />
    <br>
    <label for="password"><b>Password</b></label>
    <input type="password" class="form-control" name="password" /><br>
    <button type="submit" class="btn btn-md btn-success form-control">
    <span class="glyphicon glyphicon-lock"></span> Submit
    </button>
  </div>
    <input type="hidden" name="_token" value="{{ Session::token() }}">
</form>
