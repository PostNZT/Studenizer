
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
        <input class="form-control" type="text" name="student_id" value="" required="" placeholder="e.g. 2012702838"/>

      <br>
      <label>Name *</label>
        <input class="form-control" type="text" name="first_name" value="" required="" placeholder="First"/>
        <input class="form-control" type="text" name="middle_name" value="" required="" placeholder="Middle"/>
        <input class="form-control" type="text" name="last_name" value="" required="" placeholder="Last"/>

     <br>
       <label for="gender">Gender *</label>
       <select class="form-control" name="gender">
         <option value="none">-- Select --</option>
         <option value="1">Male</option>
         <option value="0">Female</option>
       </select>

      <br>
        <label for="student_id">Religion</label>
        <input class="form-control" type="text" name="religion" value="" required="" />

      <br>
       <label for="first_cgpa">First Sem CGPA *</label>
       <input type="text" class="form-control" name="first_sem_cgpa" value="" placeholder="e.g. 1.0" required=""/>

      <br>
        <label for="admit_type">Admit Type *</label>
        <select class="form-control" name="admit_type" id="admit_type">
        </select>

      <br>
      <label for="year_admitted">Year Admitted *</label>
      <input type="text" class="form-control" name="year_admitted" placeholder="2016"/>

      <br>
        <label for="program">Term Admitted *</label>
        <select class="form-control" name="term_admitted" id="term_admitted">

        </select>

      <br>
        <label for="program">Program *</label>
        <select class="form-control" name="program" id="program">
        </select>

        <br>
          <label for="program">Scholarship *</label>
          <select class="form-control" name="scholarship" id="scholarship">
          </select>

        <br>
        <label for="enrolled_unit">Enrolled Units *</label>
        <input type="text" class="form-control" name="enrolled_unit" value="" placeholder="e.g. 24" required=""/>

        <br>
        <label for="year_enrolled">Year Enrolled</label>
        <input type="text" class="form-control" name="year_enrolled" value="" placeholder="e.g. 2016" required=""/>

        <br>
        <label for="sem_enrolled">Semester Enrolled</label>
        <select class="form-control" name="sem_enrolled" id="sem_enrolled">
        </select>

        <br>
        <button type="submit" class="form-control btn btn-info" name="add_student">
           Submit
        </button>
        <input type="hidden" name="_token" value="{{ Session::token() }}" />
    </div>
</form>

<script>

  $(document).ready(function(){

    var term_types_route = "{{ route('term_types') }}";
    var admit_types_route = "{{ route('admit_types') }}";
    var scholarship_types_route = "{{ route('scholarship_list') }}";
    var program_list_route = "{{ route('program_list') }}";

    term_types_option_render(term_types_route);
    admit_types_option_render(admit_types_route);
    scholarship_types_option_render(scholarship_types_route);
    program_list_option_render(program_list_route);

  });

</script>
