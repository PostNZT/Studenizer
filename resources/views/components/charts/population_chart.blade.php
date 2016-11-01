<h4><b>Population Chart Report</b></h4>
<hr>

<div class="row">
    <div class="col-md-4">
      <h4>&nbsp;<b>Gender Distribution</b></h4>
      <canvas id="population_gender_canvas" height="300px" width="300px"></canvas>
    </div>
    <div class="col-md-4">
      <h4>&nbsp;<b>Tribe Distribution</b></h4>
      <canvas id="population_tribe_canvas" height="300px" width="300px"></canvas>
    </div>
</div>
<script>

  var options =  {

        responsive: true,
        scales: {
             yAxes: [{
                 ticks: {
                     beginAtZero:true
                 }
             }]
         },

         legend: {
          display: false
        },

        tooltips: {
          callbacks: {
             label: function(tooltipItem) {
                    return tooltipItem.yLabel;
             }
          }
        }

  };

  /*

    {code for json parsing will be here bitch}

  */

  @include('components.charts.json_reader.gender_chart_json')
  @include('components.charts.json_reader.tribe_chart_json')


</script>
