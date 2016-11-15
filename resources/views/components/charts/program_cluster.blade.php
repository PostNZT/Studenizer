<h4><b>Program Cluster Chart Report</b></h4>
<hr>

<div class="row">
 <h4>&nbsp;&nbsp;&nbsp;&nbsp;<b>Select Program</b></h4>

 <form class="form form-select">
    <select class="form-control" name="program_option" id="program">
    </select>
  </form>

</div>

<div class="row">
    <div class="col-md-11">
      <h4>&nbsp;<b>Program Cluster CGPA Distribution</b></h4>
      <div class="row" id="cluster_chart_container" style="min-height:350px;">
        <canvas id="program_cluster_canvas" height="150px" width="500px"></canvas>
      </div>
    </div>
</div>

<script type="text/javascript">

$(document).ready(function()
{
    var program_list_route = "{{ route('program_list') }}";
    option_render(program_list_route,"program");

});

</script>
