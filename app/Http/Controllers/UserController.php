<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function postSignup(Request $request){

        $user = new User();
        $user->username = $request['username'];;
        $user->password = bcrypt($request['password']);
        $user->first_name = $request['first_name'];
        $user->middle_name = $request['middle_name'];
        $user->last_name = $request['last_name'];
        $user->birthday = $request['birthday'];
        $user->address = $request['address'];
        $user->contact_number = $request['contact_number'];
        $user->email_address = $request['email_address'];
        $create_user_feedback = "failed to create user check logs for more info";
        $create_user_flag = 0;

        if($user->save()){
            $create_user_feedback = "user ".$user->username." was added";
            $create_user_flag = 1;
        }

        return redirect()->back()->with([
          'message' => $create_user_feedback,
          'create_user_flag' => $create_user_flag
        ]);

    }

    public function postSignin(Request $request){

      if(Auth::attempt(['username'=> $request['username'],'password'=> $request['password']])){
        return redirect()->route('student_page');
      }

      return redirect()->back();

    }

    public function getLogout(){

      Auth::logout();
      return redirect()->route('welcome_page');

    }

}
