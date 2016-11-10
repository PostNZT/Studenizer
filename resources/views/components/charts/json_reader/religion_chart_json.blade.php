var religion_chart = document.getElementById("population_religion_canvas").getContext("2d");
var religion_data = {
    labels: ["Muslim","Non Muslim"],
    datasets: [
      {
         label:'Religion Distribution',
         data: [data.muslim_population,data.muslim_non_population],
         backgroundColor: [
             'rgba(0, 93, 172, 0.2)'
         ],
         borderColor: [
             'rgba(0,93,172,2)'
         ],
         borderWidth: 1
     }]
};

var population_religion_chart = new Chart(religion_chart,{
  type:'line',
  data: religion_data,
  options: options
});
