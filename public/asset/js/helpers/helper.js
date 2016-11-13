

  /*
  * Helper Script for client side app interaction
  *
  */


$(document).ready(function(){

  /*
  *@param json data
  *@return array option_container
  */

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

  /*
  *sets chart option
  *@param none-null
  *@return object
  */

  set_chart_option = function(){

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
                display: true
              }

          };

  };

});
