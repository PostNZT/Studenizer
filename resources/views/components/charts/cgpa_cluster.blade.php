<h4><b>CGPA Cluster Chart Report</b></h4>
<hr>

<div class="row">
   <h4>&nbsp;&nbsp;&nbsp;&nbsp;<b>Select Category</b></h4>
   <form class="form form-select">
      <select class="form-control" name="cgpa_category" id="cgpa_category">
      </select>
    </form>
</div>

<div class="row">
   <div class="col-md-11">

      <h4>&nbsp;<b>CGPA Cluster Distribution</b></h4>
      <div class="row scrollable-chart-div-width">
        <div class="row" id="cluster_chart_container" style="height:400px;width:7000px;">
          <center>
            <h4 id="category-label-container"class="muted-text-search">
              <b>Select a category to view <br>cgpa category distribution in a program</b>
            </h4>
          </center>
          <canvas id="category_cluster_canvas" height="600px;" width="7000px;"></canvas>
        </div>

      </div>
  </div>
</div>

<script type="text/javascript">

$(document).ready(function()
{

    var cgpa_category_route = "{{ route('cgpa_category') }}";
    option_render(cgpa_category_route,"cgpa_category");

});

</script>
