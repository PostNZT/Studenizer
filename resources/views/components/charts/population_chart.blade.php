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
  <div class="row container">
    <table class="table table-striped table-responsive table-hover">

        <thead>
          <tr>
              <th>Program</th>
              <th>Population</th>
          </tr>
        </thead>

        <tbody id="program_table_body">
        </tbody>
    </table>
  </div>
  <div class="row scrollable-chart-div-width">
    <div style="height:400px;width:4000px;">
      <canvas id="population_program_canvas" height="700px;" width="4000px;"></canvas>
    </div>
  </div>
</div>

<script>

  $(document).ready(function ()
  {

      var gender_pop_route = "{{ route('gender_population') }}";
      var muslim_pop_route = "{{ route('muslim_population') }}";
      var course_pop_route = "{{ route('course_population') }}";
      var gender_pop_canvas = "population_gender_canvas";
      var muslim_pop_canvas = "population_religion_canvas";
      var program_pop_canvas = "population_program_canvas";

      draw_chart(gender_pop_route, gender_pop_canvas, "bar");
      draw_chart(muslim_pop_route, muslim_pop_canvas, "bar");
      draw_chart(course_pop_route, program_pop_canvas, "bar");

  });

</script>
