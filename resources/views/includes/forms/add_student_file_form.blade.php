

<form class="form-login form-horizontal form" action="{{ route('add_student_bulk') }}" method="post">
    <br>
    <h4><b>Add Student Data using <br>"Excel" or "CSV" File</b></h4>
    <label>Excel / CSV</label>
    <input type="file" class="form-control" name="name" accept="application/msexcel"/>
    <br>
    <button type="submit" class="form-control btn btn-md btn-info">
      Submit
    </button>
</form>
