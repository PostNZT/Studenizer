
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
  * Specially configured functions will be here in short static functions shits
  * I shot the sheriff
  */

  count_total_data = function(data)
  {

        var sum = 0;

        for (var i = 0; i < data.length; i++) {
          sum = sum+parseInt(data[i]);
        }

        return sum;
  };


  clear_canvas = function(canvas_element)
  {

     $('#'+canvas_element).remove();

  };

  append_canvas = function(parent_element, canvas_element, height, width)
  {

      $('#'+parent_element).append(
           '<canvas id="'+canvas_element+'" '+
           'height="'+height+'px" width="'+width+'px"></canvas>'
      );

  };

  set_population_label = function(route,label_element,label,population)
  {

        $.getJSON(route, function(data)
        {

              var data_content = extract_data_values(data.data);
              population = count_total_data(data_content);

              $("#"+label_element).html(
                    "<b>"+label+
                    "</b><br> <i>Population : "+
                    population+"</i>"
              );

         });

  };

  $("#program").change(function(){

       var program = "program="+$("#program").val();

       if(program != 'program=select')
       {
            var route = cgpa_cluster_route+"?"+program;
            clear_canvas("program_cluster_canvas");
            append_canvas("cluster_chart_container","program_cluster_canvas","200","500");
            draw_chart(route, "program_cluster_canvas", "bar");
            set_population_label(route,"program-label-container",$("#program").val());

       }

  });

  $("#cgpa_category").change(function(){

       var category = "category="+$("#cgpa_category").val();

       if(category != 'category=select')
       {
          var route = cgpa_cluster_count_route+"?"+category;
          clear_canvas("category_cluster_canvas");
          append_canvas("cluster_chart_container","category_cluster_canvas","600","7000");
          draw_chart(route, "category_cluster_canvas", "bar");
          set_population_label(route,"category-label-container",$("#cgpa_category").val());

      }

  });

});
