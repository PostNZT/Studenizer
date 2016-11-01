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


  var gender_chart = document.getElementById("population_gender_canvas").getContext("2d");
  var gender_data = {
      labels: ["Male","Female"],
      datasets: [
        {
           label:'Gender Distribution',
           data: [450,150],
           backgroundColor: [
               'rgba(255, 99, 132, 0.2)',
               'rgba(54, 162, 235, 0.2)',
           ],
           borderColor: [
               'rgba(255,99,132,1)',
               'rgba(54, 162, 235, 1)',
           ],
           borderWidth: 1
       }]
  };

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

  var population_gender_chart = new Chart(gender_chart,{
    type:'bar',
    data: gender_data,
    options: options
  });

 /*------*/

 var tribe_chart = document.getElementById("population_tribe_canvas").getContext("2d");
 var tribe_data = {
     labels: ["Meranao","Tausug","Maguindanao","Eranon"],
     datasets: [
       {
          label:'Gender Distribution',
          data: [100,200,100,200],
          backgroundColor: [
              'rgba(255, 99, 132, 0.2)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(56, 162, 225, 0.1)',
              'rgba(40, 2, 295, 0.3)',
          ],
          borderColor: [
              'rgba(255,99,132,1)',
              'rgba(54, 162, 235, 1)',
              'rgba(56, 162, 225, 1)',
              'rgba(40, 2, 295, 3)',
          ],
          borderWidth: 1
      }]
 };

 var population_tribe_chart = new Chart(tribe_chart,{
   type:'bar',
   data: tribe_data,
   options: options
 });


</script>
