<?php

namespace App\Http\Controllers\Practice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Practice;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Session;
use Cookie;


class AuthController extends Controller
{
    


  
  public function Authentication(Request $request)
  {

     if (Auth::guard('practice')->attempt(['email'=>$request->email,'password' => $request->password])) {
              
           $remember_me = $request->has('remember_me') ? true : false; 
          if($remember_me){
              Cookie::queue('email',$request->email,1440);
              Cookie::queue('password',$request->password,1440);

          }else{
            Cookie::queue('email',$request->email,-1);
            Cookie::queue('password',$request->password,-1);
          }
          $user = ['email'=>$request->email,'password' => $request->password];
             
       
            
    $token = md5(uniqid());
 
     $data = User::where('email',$request->email)->update(['token' => $token]);
     
          return redirect()->route('dashboard');
        
     
     }else{
       $errors = ['Email OR Password  are invalid'];
       return redirect()->back()->withErrors($errors);
     }
  }
}