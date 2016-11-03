var religion_chart = document.getElementById("program_cluster_canvas").getContext("2d");
var religion_data = {
    labels: ["Outstanding","Excellent"],
    datasets: [
      {
         label:'Religion Distribution',
         data: [350,250],
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
