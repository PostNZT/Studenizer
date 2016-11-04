

var tribe_chart = document.getElementById("population_tribe_canvas").getContext("2d");
var tribe_data = {
    labels: ["Maranao","Tausug","Maguindanao","Eranon"],
    datasets: [
      {
         label:'Gender Distribution',
         data: [100,200,100,200],
         backgroundColor: [
             'rgba(65, 26, 152, 0.2)'
         ],
         borderColor: [
             'rgba(65,26,152,2)'
         ],
         borderWidth: 1
     }]
};

var population_tribe_chart = new Chart(tribe_chart,{
  type:'line',
  data: tribe_data,
  options: options
});
