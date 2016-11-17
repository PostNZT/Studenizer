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

        if(!Auth::check())
          return redirect()->back();

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
                            $student->remarks = $this->determineRemarks($row['14']);

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


    public function searchStudent(Request $request)
    {

        $search_key = '%'.$request->get('search_key').'%';
        $student = Student::where('first_name','like',$search_key)
                        ->orWhere('middle_name','like',$search_key)
                        ->orWhere('last_name','like',$search_key)
                        ->orWhere('id', 'like', $search_key)
                        ->orWhere('program', 'like', $search_key)
                        ->orWhere('admit_type', 'like', $search_key)
                        ->orWhere('remarks', 'like', $search_key)
                        ->orWhere('first_sem_cgpa', 'like', $search_key)
                        ->paginate($this->student_per_page);

       return view('student')->with(compact('student'),[
          'has_student' => 'has_student'
        ]);

    }


    public function getViewStudentList()
    {

         $student = Student::orderBy('id', 'desc')->paginate($this->student_per_page);

         return view('student')->with(compact('student'), [
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


    public function getProgramClusterDistribution(Request $request)
    {

          $program = $request->get('program');
          $program_cluster_distribution = array();
          $counter_iterator = 0;

          foreach (StaticDataController::load_xml_data()->cgpa_category->data as $cgpa_category)
          {

            $program_cluster_distribution[$counter_iterator] =
            $cgpa_category.":".$this->program_remarks_counter($cgpa_category,$program);
            $counter_iterator++;

          }

          return response()->json(['data' => $program_cluster_distribution]);

    }


    public function getCGPAClusterDistribution(Request $request)
    {

        $cgpa_category = $request->get('category');
        $cgpa_cluster_distribution = array();
        $counter_iterator = 0;

        foreach (StaticDataController::load_xml_data()->program_types->data as $program)
        {

            $count = $this->program_remarks_counter($cgpa_category,$program);

            if($count != 0)
            {
              $cgpa_cluster_distribution[$counter_iterator] =
              $program." : ".$count;
              $counter_iterator++;
            }

        }

        return response()->json(['data' => $cgpa_cluster_distribution]);
    }


    private function program_remarks_counter($cgpa_category,$program)
    {

        return

        Student::where([
          'remarks' => $cgpa_category,
          'program' => $program
        ])->count();
    }

    private function determineRemarks($cgpa)
    {

          $remark_flag = 0;

          if($cgpa >= '1.00' && $cgpa < '1.25')
          {
            $remark_flag = 0;
          }
          else if($cgpa >= '1.25' && $cgpa < '1.50')
          {
            $remark_flag = 1;
          }
          else if($cgpa >= '1.50' && $cgpa < '1.75')
          {
            $remark_flag = 2;
          }
          else if($cgpa >= '1.75' && $cgpa < '2.00')
          {
            $remark_flag = 3;
          }
          else if($cgpa >= '2.00' && $cgpa < '2.25')
          {
            $remark_flag = 4;
          }
          else if($cgpa >= '2.25' && $cgpa < '2.50')
          {
            $remark_flag = 5;
          }
          else if($cgpa >= '2.50' && $cgpa < '2.75')
          {
            $remark_flag = 6;
          }
          else if($cgpa >= '2.75' && $cgpa < '3.00')
          {
            $remark_flag = 7;
          }
          else if($cgpa == '3.00')
          {
            $remark_flag = 8;
          }
          else
          {
            $remark_flag = 9;
          }


          return StaticDataController::load_xml_data()
                 ->cgpa_category
                 ->data[$remark_flag];

    }




}
