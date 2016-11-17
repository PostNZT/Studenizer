<h4><b>Statistics Summary</b></h4>
<br>

<p><b>A) Gender Student Distribution</b></p>
<hr>
<table class="table table-striped table-responsive table-hover">
    <thead id="gender_table_head">
    </thead>
    <tbody id="gender_table_body">
    </tbody>

</table>

<br>

<p><b>B) Muslim Student Distribution</b></p>
<hr>
<table class="table table-striped table-responsive table-hover">
    <thead id="muslim_table_head">
    </thead>
    <tbody id="muslim_table_body">
    </tbody>
</table>

<br>

<p><b>C) CGPA Category Student Distribution</b></p>
<hr>
<table class="table table-striped table-responsive table-hover">
    <thead id="cgpa_category_student_table_head">
    </thead>
    <tbody id="cgpa_category_student_table_body">
    </tbody>
</table>

<br>


<p><b>D) Program Student Distribution</b></p>
<hr>
  <div class="scrollable-div-table-container">
    <table class="table table-striped table-responsive table-hover" >
          <thead id="program_student_table_head">
          </thead>
          <tbody id="program_student_table_body">
          </tbody>
    </table>
  </div>

  <br>

  <p><b>D) CGPA Category Program Distribution</b></p>
  <hr>
  <p><b>1) Excellent </b></p>
    <div class="scrollable-div-table-container">
      <table class="table table-striped table-responsive table-hover" >
            <thead id="cgpa_category_program_excellent_student_table_head">
            </thead>
            <tbody id="cgpa_category_program_excellent_student_table_body">
            </tbody>
      </table>
    </div>
    <br>
    <p><b>2) Superior </b></p>
    <div class="scrollable-div-table-container">
      <table class="table table-striped table-responsive table-hover" >
            <thead id="cgpa_category_program_superior_student_table_head">
            </thead>
            <tbody id="cgpa_category_program_superior_student_table_body">
            </tbody>
      </table>
    </div>
    <br>
    <p><b>3) Very Good </b></p>
    <div class="scrollable-div-table-container">
      <table class="table table-striped table-responsive table-hover" >
            <thead id="cgpa_category_program_verygood_student_table_head">
            </thead>
            <tbody id="cgpa_category_program_verygood_student_table_body">
            </tbody>
      </table>
    </div>
    <br>
    <p><b>4) Good </b></p>
    <div class="scrollable-div-table-container">
      <table class="table table-striped table-responsive table-hover" >
            <thead id="cgpa_category_program_good_student_table_head">
            </thead>
            <tbody id="cgpa_category_program_good_student_table_body">
            </tbody>
      </table>
    </div>
    <br>
    <p><b>5) Very Satisfactory </b></p>
    <div class="scrollable-div-table-container">
      <table class="table table-striped table-responsive table-hover" >
            <thead id="cgpa_category_program_verysatisfactory_student_table_head">
            </thead>
            <tbody id="cgpa_category_program_verysatisfactory_student_table_body">
            </tbody>
      </table>
    </div>
    <br>
    <p><b>6) High Average </b></p>
    <div class="scrollable-div-table-container">
      <table class="table table-striped table-responsive table-hover" >
            <thead id="cgpa_category_program_highaverage_student_table_head">
            </thead>
            <tbody id="cgpa_category_program_highaverage_student_table_body">
            </tbody>
      </table>
    </div>
    <br>
    <p><b>7) Average </b></p>
    <div class="scrollable-div-table-container">
      <table class="table table-striped table-responsive table-hover" >
            <thead id="cgpa_category_program_average_student_table_head">
            </thead>
            <tbody id="cgpa_category_program_average_student_table_body">
            </tbody>
      </table>
    </div>
    <br>
    <p><b>8) Fair </b></p>
    <div class="scrollable-div-table-container">
      <table class="table table-striped table-responsive table-hover" >
            <thead id="cgpa_category_program_fair_student_table_head">
            </thead>
            <tbody id="cgpa_category_program_fair_student_table_body">
            </tbody>
      </table>
    </div>
    <br>
    <p><b>9) Pass </b></p>
    <div class="scrollable-div-table-container">
      <table class="table table-striped table-responsive table-hover" >
            <thead id="cgpa_category_program_pass_student_table_head">
            </thead>
            <tbody id="cgpa_category_program_pass_student_table_body">
            </tbody>
      </table>
    </div>
    <br>
    <p><b>10) Fail </b></p>
    <div class="scrollable-div-table-container">
      <table class="table table-striped table-responsive table-hover" >
            <thead id="cgpa_category_program_fail_student_table_head">
            </thead>
            <tbody id="cgpa_category_program_fail_student_table_body">
            </tbody>
      </table>
    </div>

<script>
  $(document).ready(function()
  {
        var table_headers = ['Data Label', 'Frequency'];
        var gender_pop_route   = "{{ route('gender_population') }}";
        var muslim_pop_route   = "{{ route('muslim_population') }}";
        var course_pop_route   = "{{ route('course_population') }}";
        var cgpa_student_pop_route = "{{ route('cgpa_cluster_pop_count') }}";
        var cgpa_program_student_excellent_route = "{{ route('cgpa_cluster_count') }}"+"?category=Excellent";
        var cgpa_program_student_superior_route = "{{ route('cgpa_cluster_count') }}"+"?category=Superior";
        var cgpa_program_student_verygood_route = "{{ route('cgpa_cluster_count') }}"+"?category=Very Good";
        var cgpa_program_student_good_route = "{{ route('cgpa_cluster_count') }}"+"?category=Good";
        var cgpa_program_student_verysatisfactory_route = "{{ route('cgpa_cluster_count') }}"+"?category=Very Satisfactory";
        var cgpa_program_student_highaverage_route = "{{ route('cgpa_cluster_count') }}"+"?category=High Average";
        var cgpa_program_student_average_route = "{{ route('cgpa_cluster_count') }}"+"?category=Average";
        var cgpa_program_student_fair_route = "{{ route('cgpa_cluster_count') }}"+"?category=Fair";
        var cgpa_program_student_pass_route = "{{ route('cgpa_cluster_count') }}"+"?category=Pass";
        var cgpa_program_student_fail_route = "{{ route('cgpa_cluster_count') }}"+"?category=Fail";


        populate_frequency_table(gender_pop_route, "gender_table_body", table_headers, "gender_table_head");
        populate_frequency_table(muslim_pop_route, "muslim_table_body", table_headers, "muslim_table_head");
        populate_frequency_table(course_pop_route, "program_student_table_body", table_headers, "program_student_table_head");
        populate_frequency_table(cgpa_student_pop_route, "cgpa_category_student_table_body", table_headers,
                                "cgpa_category_student_table_head");
        populate_frequency_table(cgpa_program_student_excellent_route, "cgpa_category_program_excellent_student_table_body",
                                table_headers , "cgpa_category_program_excellent_student_table_head");
        populate_frequency_table(cgpa_program_student_superior_route, "cgpa_category_program_superior_student_table_body",
                                table_headers , "cgpa_category_program_superior_student_table_head");
        populate_frequency_table(cgpa_program_student_verygood_route, "cgpa_category_program_verygood_student_table_body",
                                table_headers , "cgpa_category_program_verygood_student_table_head");
        populate_frequency_table(cgpa_program_student_good_route, "cgpa_category_program_good_student_table_body",
                                table_headers , "cgpa_category_program_good_student_table_head");
        populate_frequency_table(cgpa_program_student_verysatisfactory_route, "cgpa_category_program_verysatisfactory_student_table_body",
                                table_headers , "cgpa_category_program_verysatisfactory_student_table_head");
        populate_frequency_table(cgpa_program_student_highaverage_route, "cgpa_category_program_highaverage_student_table_body",
                                table_headers , "cgpa_category_program_highaverage_student_table_head");
        populate_frequency_table(cgpa_program_student_highaverage_route, "cgpa_category_program_highaverage_student_table_body",
                                table_headers , "cgpa_category_program_highaverage_student_table_head");
        populate_frequency_table(cgpa_program_student_highaverage_route, "cgpa_category_program_average_student_table_body",
                                table_headers , "cgpa_category_program_average_student_table_head");
        populate_frequency_table(cgpa_program_student_fair_route, "cgpa_category_program_fair_student_table_body",
                                table_headers , "cgpa_category_program_fair_student_table_head");
        populate_frequency_table(cgpa_program_student_pass_route, "cgpa_category_program_pass_student_table_body",
                                table_headers , "cgpa_category_program_pass_student_table_head");
        populate_frequency_table(cgpa_program_student_fail_route, "cgpa_category_program_fail_student_table_body",
                                table_headers , "cgpa_category_program_fail_student_table_head");

  });
</script>
