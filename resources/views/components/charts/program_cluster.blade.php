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
    <div class="col-md-4">
      <h4>&nbsp;<b>Program Cluster CGPA Distribution</b></h4>
      <canvas id="program_cluster_canvas" height="300px" width="300px"></canvas>
    </div>
</div>

<script type="text/javascript">

$(document).ready(function()
{
    var program_list_route = "{{ route('program_list') }}";
    program_list_option_render(program_list_route);
    program_cluster_chart();

});

</script>
