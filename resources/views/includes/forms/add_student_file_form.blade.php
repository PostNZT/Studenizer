

<form enctype="multipart/form-data" class="form-login form-horizontal form" action="{{ route('add_student_bulk') }}" method="post">
    <br>
    <h4><b>Add Student Data using <br>"Excel" or "CSV" File</b></h4>
    <label for="datasheet">Excel / CSV</label>
    <input type="file" class="form-control" name="datasheet" />
    <br>
    <button type="submit" class="form-control btn btn-md btn-info">
      Submit
    </button>
    <input type="hidden" name="_token" value="{{ Session::token() }}"/>
</form>
