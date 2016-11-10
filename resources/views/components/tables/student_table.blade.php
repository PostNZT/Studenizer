

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


