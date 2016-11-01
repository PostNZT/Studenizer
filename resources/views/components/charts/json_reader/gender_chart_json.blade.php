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

  var population_gender_chart = new Chart(gender_chart,{
    type:'line',
    data: gender_data,
    options: options
  });
