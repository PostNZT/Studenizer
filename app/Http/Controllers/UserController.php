<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function postSignup(Request $request){

      $username = $request['username'];
      $password = bcrypt($request['password']);

      $user = new User();
      $user->username = $username;
      $user->password = $password;
      $user->first_name = "fuck";
      $user->middle_name = "bitch";
      $user->last_name = "shit";
      $user->birthday = "2016-11-05 ";
      $user->address = "di makita street";
      $user->contact_number = "19318638613";
      $user->email_address = "fuck@yahoo.com";

      $user->save();

      return redirect()->back();

    }

    public function postSignin(Request $request){

      if(Auth::attempt(['username'=> $request['username'],'password'=> $request['password']])){
        return redirect()->route('student_page');
      }

      return redirect()->back();

    }
}
