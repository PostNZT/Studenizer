
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

  extract_total_population = function(data)
  {

      $("#total-population").html("&nbsp;&nbsp;&nbsp;&nbsp;Total Population : "+
      "<strong>"+data.total_population+"</strong>");

  };

  gender_population_render = function(gender_pop_route)
  {

    $.getJSON( gender_pop_route, function( data )
    {

        extract_total_population(data);

        var gender_chart = $("#population_gender_canvas").get(0).getContext("2d");
        var gender_labels = ['Male','Female'];
        var gender_data = [data.male_population ,data.female_population];
        var chart_type = 'bar';
        var chart_background =  [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
        ];

        var chart_border = [
            'rgba(255,99,132,1)',
            'rgba(54, 162, 235, 1)',
        ];

        populate_data(
          gender_labels,
          gender_data,
          chart_background,
          chart_border,
          gender_chart,
          chart_type
        );
    });

  };


  muslim_population_render = function(muslim_pop_route)
  {

    $.getJSON(muslim_pop_route, function ( data )
    {

        var religion_chart = $("#population_religion_canvas").get(0).getContext("2d");
        var religion_labels = ['Muslim','Non Muslim'];
        var religion_data = [data.muslim_population,data.muslim_non_population];
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
          religion_labels,
          religion_data,
          chart_background,
          chart_border,
          religion_chart,
          chart_type
        );

    });

  };

  course_population_render = function(course_pop_route)
  {

    $.getJSON(course_pop_route, function ( data )
    {
            var program_labels  = [];
            var program_population = [];
            var background_color = [];
            var border_color = [];

            for (var i = 0; i < data.counts.length; i++)
            {

              var split_data = data.counts[i].split(":");
              program_labels[i] = ""+split_data[0]+"";
              program_population[i] = split_data[1];
              background_color[i] = random_color_generator();
              border_color[i] = random_color_generator();

            }


            var program_population_chart = document.getElementById("population_program_canvas").getContext('2d');
            var chart_type = "bar";

            populate_data(
              program_labels,
              program_population,
              background_color,
              border_color,
              program_population_chart,
              chart_type
            );


    });

  };


  term_types_option_render = function(term_types_route)
  {

      $.getJSON(term_types_route, function (data)
      {

          var option_container = fill_option_container(data.semester);
          $("#term_admitted").html(option_container);
          $("#sem_enrolled").html(option_container);

      });

  };

  admit_types_option_render = function(admit_types_route)
  {

      $.getJSON(admit_types_route, function(data)
      {

         var option_container = fill_option_container(data.admit);
         $("#admit_type").html(option_container);

      });

  };

  scholarship_types_option_render = function(scholarship_types_route)
  {

    $.getJSON(scholarship_types_route, function(data)
    {

        var option_container = fill_option_container(data.scholarship);
        $("#scholarship").html(option_container);

    });

  };

  program_list_option_render = function(program_list_route)
  {

    $.getJSON(program_list_route, function(data)
    {

        var option_container = fill_option_container(data.program);
        $("#program").html(option_container);

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

  random_color_generator = function(){
    return "#"+((1<<24)*Math.random()|0).toString(16);
  };


});
