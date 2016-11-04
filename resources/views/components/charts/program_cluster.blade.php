<h4><b>Program Cluster Chart Report</b></h4>
<hr>

<div class="row">
 <h4>&nbsp;&nbsp;&nbsp;&nbsp;<b>Select Program</b></h4>

 <form class="form form-select">
    <select class="form-control" name="program_option">
        <option>BS Information Technology</option>
        <option>BS Civil Engineering</option>
        <option>BS Mathematics</option>
        <option>AB Psychology</option>
    </select>
  </form>

</div>

<div class="row">
    <div class="col-md-4">
      <h4>&nbsp;<b>Program Cluster CGPA Distribution</b></h4>
      <canvas id="program_cluster_canvas" height="300px" width="300px"></canvas>
    </div>
</div>
<script>

  /*
    {code for json parsing will be here bitch}
  */
@include('components.charts.json_reader.program_cluster_chart_json')

</script>
