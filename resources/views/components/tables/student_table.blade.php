

<table class="table table-striped table-responsive table-hover">

    <thead>
      <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Program</th>
          <th>Year Level</th>
          <th>CGPA</th>
          <th>Remarks</th>
      </tr>
    </thead>

    <tbody>

        @foreach($student as $student)
            <tr>
               <td>{{ $student->id }}</td>
               <td>{{ $student->first_name . ' ' . $student->middle_name. ' ' . $student->last_name}}</td>
               <td>{{ $student->program }}</td>
               <td>{{ $student->admit_type }}</td>
               <td>{{ $student->first_sem_cgpa }}</td>
               <td>{{ $student->remarks }}</td>
            </tr>
        @endforeach


    </tbody>
</table>
