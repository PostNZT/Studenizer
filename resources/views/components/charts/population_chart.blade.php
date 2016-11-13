<h4><b>Population Chart Report</b></h4>
<hr>

<div class="row">
  <h4 id="total-population"></h4>
</div>

<div class="row">
    <div class="col-md-4">
      <h4>&nbsp;<b>Gender Distribution</b></h4>
      <canvas id="population_gender_canvas" height="300px" width="300px"></canvas>
    </div>
    <div class="col-md-4">
      <h4>&nbsp;<b>Muslim Distribution</b></h4>
      <canvas id="population_religion_canvas" height="300px" width="300px"></canvas>
    </div>
</div>

<div class="row">
  <h4>&nbsp;<b>Program Distribution</b></h4>
  <canvas id="population_program_canvas" height="200px" width="300px"></canvas>
</div>

<script>

  $(document).ready(function ()
  {

      var gender_pop_route = "{{ route('gender_population') }}";
      var muslim_pop_route = "{{ route('muslim_population') }}";
      var course_pop_route = "{{ route('course_population') }}";

      gender_population_render(gender_pop_route);
      muslim_population_render(muslim_pop_route);
      course_population_render(course_pop_route);

  });

</script>
