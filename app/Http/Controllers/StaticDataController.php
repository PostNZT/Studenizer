<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class StaticDataController extends Controller
{

      public static function load_xml_data()
      {

        return simplexml_load_string(Storage::get('xmls/static.xml'));

      }

      public function getAdmitTypes()
      {

         $admits_xml = $this->load_xml_data();
         return response()->json($admits_xml->admit_types);

      }

      public function getTermTypes()
      {

         $semester_xml = $this->load_xml_data();
         return response()->json($semester_xml->semester_types);

      }

      public function getScholarshipList()
      {

          $scholarship_xml = $this->load_xml_data();
          return response()->json($scholarship_xml->scholarship_types);

      }

      public function getProgramList()
      {

          $programs_xml = $this->load_xml_data();
          return response()->json($programs_xml->program_types);
      }

}
