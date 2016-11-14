
$(document).ready(function(){


  fill_option_container = function(data)
  {

      var option_container = "<option value='select'>-- select --</option>";

      for (var i = 0; i < data.length; i++)
      {
         option_container = option_container+
                            "<option value='"+data[i]+"'>"+
                            data[i]+"</option>";
      }

      return option_container;

  };


  set_chart_option_default = function(){

    return   {

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


          };

  };


  generate_frequency_table = function(chart_labels, chart_data, table_body)
  {

      var table_data = "";

      for (var i = chart_data.length-1; i > 0; i--)
      {
          table_data = "<tr><td>"+chart_labels[i]+
                       "</td><td>"+chart_data[i]+
                       "<td></tr>"+table_data;
      }

      $("#"+table_body).html(table_data);

  };

  random_color_generator = function()
  {

    return "#"+((1<<24)*Math.random()|0).toString(16);

  };

});
