<?php

namespace App\Http\Controllers;

use Excel;
use App\Student;
use Illuminate\Http\Request;


class StudentController extends Controller
{

    private $student_per_page = 20;

    private function addStudentHelper(Student $student,Request $request)
    {

      $student->id = $request['student_id'];
      $student->first_name = $request['first_name'];
      $student->middle_name = $request['middle_name'];
      $student->last_name = $request['last_name'];
      $student->birthday = $request['birthday'];
      $student->gender = $request['gender'];
      $student->religion = $request['religion'];
      $student->first_sem_cgpa = $request['first_sem_cgpa'];
      $student->admit_type = $request['admit_type'];
      $student->year_admitted = $request['year_admitted'];
      $student->term_admitted = $request['term_admitted'];
      $student->program = $request['program'];
      $student->scholarship = $request['scholarship'];
      $student->enrolled_units = $request['enrolled_unit'];
      $student->year_enrolled = $request['year_enrolled'];
      $student->semester_enrolled = $request['sem_enrolled'];
      
      return $student;

    }

    public function postAddStudent(Request $request)
    {

        $student = new Student();
        $student = $this->AddStudentHelper($student,$request);

        $create_student_feedback = "failed to add a student check logs for more info";
        $create_student_flag = 0;

        if($student->save())
        {

          $create_student_feedback = "student "
                                     .$student->first_name." ".$student->middle_name." ".$student->last_name
                                     ." was added";
          $create_student_flag = 1;

        }

        return redirect()->route('add_student')->with([

          'message' => $create_student_feedback,
          'create_student_flag' => $create_student_flag

        ]);

    }

    private function uploadDataFile(Request $request)
    {

        $filename = "";

        if($request->hasFile('datasheet'))
        {

            $file = $request->file('datasheet');
            if($file->guessClientExtension() == "xls")
            {
                $filename = $file->storeAs('datasheets','student.xls');
            }

        }

        return $filename;

    }

    public function postAddBulkStudent(Request $request){


        $filename = $this->uploadDataFile($request);

        echo $filename;

      //code..

    }


    public function getViewStudentList()
    {

         $student = Student::orderBy('id', 'desc')->paginate($this->student_per_page);

         return view('/student')->with(compact('student'),[

           'has_student' => 'has_student'

         ]);
    }

}
