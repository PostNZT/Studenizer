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

    public function postAddBulkStudent()
    {


            ini_set('max_execution_time', 500);

            Excel::load(Input::file('datasheet'), function ($reader)
            {

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
                                //no shits to except
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


    public function getStudentPopulation()
    {

        return response()->json([
          'data' => Student::count()
        ]);
    }

    public function getGenderPopulation()
    {

        $gender_population = array();
        $gender_population[0] = " Male : ".Student::where(['gender' => '1'])->count();
        $gender_population[1] = " Female : ".Student::where(['gender' => '0'])->count();

        return response()->json([
            'data' => $gender_population
        ]);

    }

    public function getMuslimPopulation()
    {

        $muslim_population = array();
        $muslim_population[0] = " Muslim : ".Student::where(['religion'=>'Muslim'])->count();
        $muslim_population[1] = " Non Muslim :".Student::where(['religion'=>'Non-Muslim'])->count();

        return response()->json([
            'data' => $muslim_population
        ]);

    }

    public function getCoursePopulation(){


        $program_population_counter = array();
        $counter_iterator = 0;

        foreach(StaticDataController::load_xml_data()->program_types->data as $program)
        {

          $program = str_replace("and", "&", $program);
          $count = Student::where(['program' =>$program])->count();
          $program_population_counter[$counter_iterator] = $program.' : '.$count;
          $counter_iterator++;

        }

        return response()->json([
            'data' => $program_population_counter
        ]);

    }




}
