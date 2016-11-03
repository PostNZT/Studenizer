
<form class="form form-horizontal form-login" action="index.html" method="post">

    <div class="form-group">

        <label for="student_id">Student ID *</label>
        <input class="form-control" type="text" name="student_id" value="" class="required" placeholder="e.g. 2012702838"/>

      <br>
      <label for="first_name">Name *</label>
        <input class="form-control" type="text" name="student_id" value="" class="required" placeholder="First"/>
        <input class="form-control" type="text" name="student_id" value="" class="required" placeholder="Middle"/>
        <input class="form-control" type="text" name="student_id" value="" class="required" placeholder="Last"/>

      <br>
        <label for="birthday">Birthday *</label>
        <div class="input-group input-append date" id="dp1">
             <input name="birthday" type="text" class="form-control" name="date" disabled=""/>
             <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
        </div>

     <br>
        <label for="gender">Gender *</label>
         <div class="form-control" name="gender">
          <input type="radio" name="name" value=""> Male</input>&nbsp;
          <input type="radio" name="name" value=""> Female</input>
        </div>

      <br>
        <label for="student_id">Religion</label>
        <input class="form-control" type="text" name="student_id" value="" class="required" />

      <br>
       <label for="first_cgpa">First Sem CGPA *</label>
       <input type="text" class="form-control" name="name" value="" placeholder="e.g. 1.0"/>

      <br>
        <label for="admit_type">Admit Type *</label>
        <select class="form-control" name="admit_type">
          <option value="Freshman">-- Select --</option>
          <option value="Freshman">Freshman</option>
          <option value="Freshman">Sophomore</option>
          <option value="Freshman">Junior</option>
          <option value="Freshman">Senior</option>
        </select>

      <br>
      <label for="year_admitted">Year Admitted *</label>
      <input type="text" class="form-control" name="year_admitted" placeholder="2016"/>

      <br>
        <label for="program">Term Admitted *</label>
        <select class="form-control" name="admit_type">
          <option value="Freshman">-- Select --</option>
          <option value="Freshman">1st Semester</option>
          <option value="Freshman">2nd Semester</option>
          <option value="Freshman">3rd Semester</option>
          <option value="Freshman">4th Semester</option>
        </select>

      <br>
        <label for="program">Program *</label>
        <select class="form-control" name="admit_type">
          <option value="Freshman">-- Select --</option>
          <option value="Freshman">BS Information Technology</option>
          <option value="Freshman">BS Accountancy</option>
          <option value="Freshman">BS Social Work</option>
          <option value="Freshman">BS Civil Engineering</option>
        </select>

        <br>
          <label for="program">Scholarship *</label>
          <select class="form-control" name="admit_type">
            <option value="Freshman">-- Select --</option>
            <option value="Freshman">Paying</option>
            <option value="Freshman">Dependent</option>
            <option value="Freshman">SPL</option>
            <option value="Freshman">Tuition Privilege</option>
            <option value="Freshman">Academic</option>
            <option value="Freshman">Science</option>
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
          <option value="Freshman">-- Select --</option>
          <option value="Freshman">1st Semester</option>
          <option value="Freshman">2nd Semester</option>
          <option value="Freshman">3rd Semester</option>
          <option value="Freshman">4th Semester</option>
        </select>

        <br>
        <button type="submit" class="form-control btn btn-info" name="add_student">
           Submit
        </button>

    </div>
</form>

<script type="text/javascript">
  $('#dp1').datepicker({
          format: 'mm/dd/yyyy'
  });
</script>
