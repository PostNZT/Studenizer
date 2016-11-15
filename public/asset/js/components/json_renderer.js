
/*
*Script to render json data
*@author: Nelmin Jay Magan Anoc
*/

$(document).ready(function()
{

  populate_data = function(chart_labels,chart_data,chart_background,chart_border,chart_canvas, chart_type)
  {

        var options = set_chart_option_default();

        var data = {
            labels: chart_labels ,
            datasets: [
              {
                 label:'',
                 data:chart_data ,
                 backgroundColor:chart_background,
                 borderColor:chart_border,
                 borderWidth: 1
             }]
        };

        new Chart(chart_canvas,{
          type:chart_type,
          data: data,
          options: options
        });

  };

  extract_total_population = function(population_route, html_element)
  {

      $.getJSON(population_route,function(data)
      {

        $("#"+html_element).html("&nbsp;&nbsp;&nbsp;&nbsp;Total Population : "+
        "<strong>"+data.data+"</strong>");

      });

  };

  extract_data_labels = function(data)
  {

      var data_labels = [];

      for (var i = 0; i < data.length; i++)
      {

          var split_data = data[i].split(":");
          data_labels[i] = ""+split_data[0]+"";

      }

      return data_labels;

  };

  extract_data_values = function(data)
  {

       var data_contents = [];

       for(var i = 0; i < data.length; i++)
       {

         var split_data = data[i].split(":");
         data_contents[i] = split_data[1];

       }

       return data_contents;

  };


   populate_background_color = function(data)
   {

        var background_color = [];

        for(var i = 0; i < data.length; i++)
        {

          background_color[i] = "#65dc65";

        }

        return background_color;

   };


   populate_border_color = function(data)
   {

       var border_color = [];

       for(var i = 0; i < data.length; i++)
       {

         border_color[i] = "#65dc65";

       }

       return border_color;

   };

   draw_chart = function(route, chart_canvas, chart_type)
   {

      $.getJSON(route, function(data)
      {

          var chart = $("#"+chart_canvas).get(0).getContext("2d");
          var labels = extract_data_labels(data.data);
          var data_content = extract_data_values(data.data);
          var data_background = populate_background_color(data.data);
          var data_border = populate_border_color(data.data);

          populate_data(
            labels,
            data_content,
            data_background,
            data_border,
            chart,
            chart_type
          );

      });

   };

  option_render = function(route, selector)
  {

      $.getJSON(route, function(data)
      {

          var option_container = fill_option_container(data.data);
          $("#"+selector).html(option_container);

      });

  };


  /*
  *Dynamic charts will be placed here
  */

  program_cluster_chart = function()
  {

        var program_cluster_chart = document.getElementById("program_cluster_canvas").getContext("2d");
        var program_cluster_labels = ['Outstanding','Poor'];
        var program_cluster_data = [350,250];
        var chart_type = 'bar';
        var chart_background = [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
        ];

        var chart_border = [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
        ];

        populate_data(
          program_cluster_labels,
          program_cluster_data,
          chart_background,
          chart_border,
          program_cluster_chart,
          chart_type
        );

  };

  populate_frequency_table = function(frequency_route, table_body_element, table_headers, table_header_element)
  {

          var column_count = table_headers.length;
          var table_header_labels = "";

          for (var i = 0; i < column_count; i++)
          {

              var table_row_head = '';
              var table_row_tail = '';

              if(i == '0')
              {
                  table_row_head = '<tr>';

              }else if(i+1 == column_count)
              {
                  table_row_tail = '</tr>';
              }

              table_header_labels = table_row_head+table_header_labels+'<th>'+table_headers[i]+'</th>'+table_row_tail;

          }

          $.getJSON(frequency_route,function(data)
          {

              var table_data = "";

              for (var i = data.data.length-1; i > 0; i--)
              {

                  var split_data = data.data[i].split(":");
                  var column_data = "";

                  for(var x = 0 ; x < column_count ; x++)
                  {
                      column_data = column_data+"<td>"+split_data[x]+"</td>";
                  }

                  table_data = "<tr>"+column_data+"</tr>"+table_data;

              }

              $("#"+table_header_element).html(table_header_labels);
              $("#"+table_body_element).html(table_data);


          });

  };

  /*
  * Specially configured functions will be here in short static functions
  */

  $("#program").change(function(){

       var program = "program="+$("#program").val();

       $.getJSON(cgpa_cluster_route+"", program, function(data)
       {
           $('#program_cluster_canvas').remove();
           $('#cluster_chart_container').append(
             '<canvas id="program_cluster_canvas"  height="200px" width="500px"></canvas>'
           );
           var chart = $("#program_cluster_canvas").get(0).getContext("2d");
           var labels = extract_data_labels(data.data);
           var data_content = extract_data_values(data.data);
           var data_background = populate_background_color(data.data);
           var data_border = populate_border_color(data.data);
           var chart_type = "bar";

           populate_data(
             labels,
             data_content,
             data_background,
             data_border,
             chart,
             chart_type
           );
           
       });

  });

});
