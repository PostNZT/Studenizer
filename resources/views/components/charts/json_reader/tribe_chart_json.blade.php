

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
