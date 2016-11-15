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

         return response()->json($this->load_xml_data()->admit_types);

      }

      public function getTermTypes()
      {

         return response()->json($this->load_xml_data()->semester_types);

      }

      public function getScholarshipList()
      {

         return response()->json($this->load_xml_data()->scholarship_types);

      }

      public function getProgramList()
      {

          return response()->json($this->load_xml_data()->program_types);

      }

}
