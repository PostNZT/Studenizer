
@if(Session::has('message'))
  @if(Session::get('create_student_flag') == 1)
      @include('includes.message_warnings_notice_layout.message_success')
  @elseif(Session::get('create_student_flag') == 0)
      @include('includes.message_warnings_notice_layout.message_failed')
  @endif
@endif


<form class="form form-horizontal form-login" action="{{ route('add_student_post') }}" method="post">

    <div class="form-group">

        <label for="student_id">Student ID *</label>
        <input class="form-control" type="text" name="student_id" value="" class="required" placeholder="e.g. 2012702838"/>

      <br>
      <label>Name *</label>
        <input class="form-control" type="text" name="first_name" value="" class="required" placeholder="First"/>
        <input class="form-control" type="text" name="middle_name" value="" class="required" placeholder="Middle"/>
        <input class="form-control" type="text" name="last_name" value="" class="required" placeholder="Last"/>

      <br>
        <label for="birthday">Birthday *</label>
        <div class="input-group input-append date" id="dp1">
             <input name="birthday" type="text" class="form-control"/>
             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>

     <br>
       <label for="gender">Gender *</label>
       <select class="form-control" name="gender">
         <option value="none">-- Select --</option>
         <option value="1">Male</option>
         <option value="0">Female</option>
       </select>

      <br>
        <label for="student_id">Religion</label>
        <input class="form-control" type="text" name="religion" value="" class="required" />

      <br>
       <label for="first_cgpa">First Sem CGPA *</label>
       <input type="text" class="form-control" name="first_sem_cgpa" value="" placeholder="e.g. 1.0"/>

      <br>
        <label for="admit_type">Admit Type *</label>
        <select class="form-control" name="admit_type">
          <option value="none">-- Select --</option>
          <option value="freshman">Freshman</option>
          <option value="sophomore">Sophomore</option>
          <option value="junior">Junior</option>
          <option value="senior">Senior</option>
        </select>

      <br>
      <label for="year_admitted">Year Admitted *</label>
      <input type="text" class="form-control" name="year_admitted" placeholder="2016"/>

      <br>
        <label for="program">Term Admitted *</label>
        <select class="form-control" name="term_admitted">
          <option value="none">-- Select --</option>
          <option value="freshman">1st Semester</option>
          <option value="sophomore">2nd Semester</option>
          <option value="junior">3rd Semester</option>
          <option value="senior">4th Semester</option>
        </select>

      <br>
        <label for="program">Program *</label>
        <select class="form-control" name="program">
          <option value="none">-- Select --</option>
          <option value="BS Information Technology">BS Information Technology</option>
          <option value="BS Accountancy">BS Accountancy</option>
          <option value="BS Social Work">BS Social Work</option>
          <option value="BS Civil Engineering">BS Civil Engineering</option>
        </select>

        <br>
          <label for="program">Scholarship *</label>
          <select class="form-control" name="scholarship">
            <option value="none">-- Select --</option>
            <option value="Paying">Paying</option>
            <option value="Dependent">Dependent</option>
            <option value="SPL">SPL</option>
            <option value="Tuition Privilege">Tuition Privilege</option>
            <option value="Academic">Academic</option>
            <option value="Science">Science</option>
          </select>

        <br>
        <label for="enrolled_unit">Enrolled Units *</label>
        <input type="text" class="form-control" name="enrolled_unit" value="" placeholder="e.g. 24" />

        <br>
        <label for="year_enrolled">Year Enrolled</label>
        <input type="text" class="form-control" name="year_enrolled" value="" placeholder="e.g. 2016" />

        <br>
        <label for="sem_enrolled">Semester Enrolled</label>
        <select class="form-control" name="sem_enrolled">
          <option value="none">-- Select --</option>
          <option value="1st Semester">1st Semester</option>
          <option value="2nd Semester">2nd Semester</option>
          <option value="3rd Semester">Summer</option>
        </select>

        <br>
        <button type="submit" class="form-control btn btn-info" name="add_student">
           Submit
        </button>
        <input type="hidden" name="_token" value="{{ Session::token() }}" />
    </div>
</form>

<script type="text/javascript">
  $('#dp1').datepicker({
          format: 'yyyy-mm-dd'
  });
</script>
