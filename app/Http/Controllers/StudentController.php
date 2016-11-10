<?php

namespace App\Http\Controllers;

use Excel;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use League\Flysystem\Exception;

class StudentController extends Controller
{

    private $student_per_page = 20;


    private function addStudentHelper(Student $student,Request $request)
    {

      $student->id = $request['student_id'];
      $student->first_name = $request['first_name'];
      $student->middle_name = $request['middle_name'];
      $student->last_name = $request['last_name'];
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

    private function checkIfNull($object)
    {

        if($object == '')
            $object = 'N/A';

        return $object;

    }

    public function postAddBulkStudent(){


            ini_set('max_execution_time', 500);
            Excel::load(Input::file('datasheet'), function ($reader) {

                $reader->each(function($sheet)
                {


                    foreach ($sheet->toArray() as $row)
                    {

                        try
                        {

                            $student = new Student();

                            $student->id = $row['3'];
                            $student->first_name = $row['5'];
                            $student->middle_name = $this->checkIfNull($row['6']);
                            $student->last_name = $row['4'];

                            $gender_flag = $row['13'];

                            $gender_value = 0;

                            if($gender_flag == "Male")
                                $gender_value = 1;

                            $student->gender = $gender_value;
                            $student->religion = $this->checkIfNull($row['10']);
                            $student->first_sem_cgpa = $row['14'];
                            $student->admit_type = $row['7'];
                            $student->year_admitted = $row['1'];
                            $student->term_admitted = $row['2'];
                            $student->program = $row['8'];
                            $student->scholarship = $row['9'];
                            $student->enrolled_units = $row['12'];
                            $student->year_enrolled = $row['15'];
                            $student->semester_enrolled = $row['16'];

                            $student->save();

                        }
                        catch (Exception $except)
                        {
                                //nothing to except shit
                        }


                    }

                });

            });

        return redirect()->back();

    }


    public function getViewStudentList()
    {

         $student = Student::orderBy('id', 'desc')->paginate($this->student_per_page);

         return view('/student')->with(compact('student'), [

           'has_student' => 'has_student'

         ]);
    }


    private function getStudentPopulation()
    {
        $student_population = Student::count();

        return $student_population;
    }

    public function getGenderPopulation()
    {

        $gender_male_population = Student::where(['gender'=>'1'])->count();
        $gender_female_population = Student::where(['gender'=>'0'])->count();
        $total_population = $this->getStudentPopulation();

        return response()->json([
            'male_population' => $gender_male_population,
            'female_population' => $gender_female_population,
            'total_population' => $total_population
        ]);

    }

    public function getMuslimPopulation()
    {
        $muslim_non_population = Student::where(['religion'=>'Muslim'])->count();
        $muslim_population = Student::where(['religion'=>'Non-Muslim'])->count();

        return response()->json([
           'muslim_non_population' => $muslim_non_population,
           'muslim_population' => $muslim_population
        ]);
    }

}
