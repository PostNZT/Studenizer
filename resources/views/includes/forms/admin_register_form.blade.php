

@if(Session::has('message'))
  @if(Session::get('create_user_flag') == 1)
      @include('includes.message_warnings_notice_layout.message_success')
  @elseif(Session::get('create_user_flag') == 0)
      @include('includes.message_warnings_notice_layout.message_failed')
  @endif
@endif

<form class="form form-horizontal form-login" action="{{ route('admin_register_post') }}" method="post">
  <h3>Register Admin User</h3><br>
  <h4><b>Personal Information</b></h4>
  <hr>
  <label>Name</label>
  <input class="form-control" type="text" name="first_name" placeholder="first name"/>
  <input class="form-control" type="text" name="middle_name" placeholder="middle name"/>
  <input class="form-control" type="text" name="last_name" placeholder="last name"/>

  <br>
  <label for="birthday">Birthday *</label>
  <div class="input-group input-append date" id="dp1">
    <input type="text" class="form-control" name="birthday"  />
    <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
  </div>

  <br>
  <label for="address">Address</label>
  <input class="form-control" type="text" name="address" placeholder="e.g. 6th street, MSU"/>

  <br>
  <label for="address">Contact Number</label>
  <input class="form-control" type="text" name="contact_number" placeholder="e.g. 09126152980"/>

  <br>
  <label for="password">Email Address</label>
  <input class="form-control" type="text" name="email_address" />

  <br>
  <h4><b>Account Information</b></h4>
  <hr>
  <label for="username">Username</label>
  <input class="form-control"type="text" name="username"/>

  <br>
  <label for="password">Password</label>
  <input class="form-control" type="password" name="password" />

  <br>
  <input class="btn btn-info btn-md form-control" type="submit" name="name" value="SignUp" />
  <input type="hidden" name="_token" value="{{ Session::token() }}">
</form>

<script type="text/javascript">
  $('#dp1').datepicker({
          format: 'yyyy-mm-dd'
  });
</script>
