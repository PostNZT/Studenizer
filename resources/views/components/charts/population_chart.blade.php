<h4><b>Population Chart Report</b></h4>
<hr>

<div class="row">
  <h4>&nbsp;&nbsp;&nbsp;&nbsp;Total Population : 600</h4>
</div>

<div class="row">
    <div class="col-md-4">
      <h4>&nbsp;<b>Gender Distribution</b></h4>
      <canvas id="population_gender_canvas" height="300px" width="300px"></canvas>
    </div>
    <div class="col-md-4">
      <h4>&nbsp;<b>Tribe Distribution</b></h4>
      <canvas id="population_tribe_canvas" height="300px" width="300px"></canvas>
    </div>
    <div class="col-md-4">
      <h4>&nbsp;<b>Religion Distribution</b></h4>
      <canvas id="population_religion_canvas" height="300px" width="300px"></canvas>
    </div>
</div>
<script>

  /*
    {code for json parsing will be here bitch}
  */

  @include('components.charts.json_reader.gender_chart_json')
  @include('components.charts.json_reader.tribe_chart_json')
  @include('components.charts.json_reader.religion_chart_json')

</script>
