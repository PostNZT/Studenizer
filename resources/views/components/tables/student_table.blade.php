

<table class="table table-striped table-responsive table-hover">
    <thead>
      <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Program</th>
          <th>Year Level</th>
          <th>CGPA</th>
      </tr>
    </thead>
    <tbody>

    <center>
        <h4 class="muted-text-search text-muted">
          @if(Request::url() == route('student_page'))
            Display student records by <b>"Searching"</b> or <br>pressing the <b>"All Students"</b> button.
          @endif
        </h4>
    </center>

    @if(Request::url() == route('view_all_student'))
        @foreach($student as $student)
            <tr>
               <td>{{ $student->id }}</td>
               <td>{{ $student->first_name . ' ' . $student->middle_name. ' ' . $student->last_name}}</td>
               <td>{{ $student->program }}</td>
               <td>{{ $student->admit_type }}</td>
               <td>{{ $student->first_sem_cgpa }}</td>
            </tr>
        @endforeach
    @endif
    </tbody>
</table>
