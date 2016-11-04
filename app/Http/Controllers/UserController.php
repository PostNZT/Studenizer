<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function postSignup(Request $request){

      $username = $request['username'];
      $password = bcrypt($request['password']);



    }

    public function postSignin(){

    }
}
