
<form class="form form-horizontal form-login" action="index.html" method="post">
    <div class="form-group">
      <label for="student_id">Student ID *</label>
      <input class="form-control" type="text" name="student_id" value="" class="required" />

      <br>
      <label for="first_name">Name</label>
        <input class="form-control" type="text" name="student_id" value="" class="required" placeholder="First"/>
        <input class="form-control" type="text" name="student_id" value="" class="required" placeholder="Middle"/>
        <input class="form-control" type="text" name="student_id" value="" class="required" placeholder="Last"/>

      <br>
        <label for="birthday">Birthday</label>
        <input name="birthday" class="form-control" size="15" type="text" value="" id="dp1">

      <br>
        <label for="student_id">Religion</label>
        <input class="form-control" type="text" name="student_id" value="" class="required" />



    </div>
</form>

<script type="text/javascript">
$('#dp1').datepicker({
  format: 'mm-dd-yyyy'
});
</script>
