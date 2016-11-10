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
<script>



  $(document).ready(function ()
  {

      $.getJSON( "{{ route('gender_population') }}", function( data )
      {
          $("#total-population").html("Total Population "+data.total_population);
          @include('components.charts.json_reader.gender_chart_json')
      });

      $.getJSON("{{ route('muslim_population') }}", function ( data ) {
          @include('components.charts.json_reader.religion_chart_json')
      });


  });

</script>
