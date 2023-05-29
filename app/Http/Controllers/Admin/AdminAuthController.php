<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;

use App\Models\Admin;
use App\Models\Banner;
use App\Models\passwordResetAdmin;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Mail;


class AdminAuthController extends Controller
{

    public function index(){
        return view('Admin.index');
    }

    public function loginAuth(Request $request)
    {
        $auth = Auth::guard('admin')->attempt(['email'=>$request->email,'password'=> $request->password]);
     

        if ($auth) 
        {
          

           return redirect()->route('admindashboard');
           $profilepic = Admin::where('id', Auth::id())->first();
           
           $profile_img =$profilepic->uploadPhoto; 
           $profile_image = Session::put('Admin_pic',    $profile_img);
        }
        else{
            $errors = ['Email or Password invalid'];
            return redirect()->back()->withErrors($errors);
        }
    }

    // forget password
   


    //--------------------



    
    public function forgetPasswordLoadAdmin(Request $request){
        return view('Admin.ForgetPassword');
    }


   


    public function forgetPasswordAdmin(Request $request){

        try{
          
           $user =  Admin::where('email', $request->email)->first();


            if($user){
                $token = Str::random(40);
                $domain = URL::to("/");
                $url =$domain ."/Admin/reset-password-admin?token=" .$token;
             
                $data["url"] = $url;
                $data["email"] = $request->email;
                $data["title"] = "Password Reset";
                $data["body"] =
                    "Please click on below link to reset your password";

                Mail::send("Admin.forgetPasswordMail", ["data" => $data], function (
                    $message
                ) use ($data) {
                    $message->to($data["email"])->subject($data["title"]);
                });


                $datetime = Carbon::now()->format('Y-m-d H:i:s'); 

                passwordResetAdmin::Create(
                    
                    [
                        "email" => $request->email,
                        "token" => $token,
                        "created_at" => $datetime,
                    ]
                );
    
                return back()->with(
                    "success",
                    "Please check your mail to reset your password"
                );
            } else {
                return back()->with("error", "Email is Not Exists!");
            }

        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        }
    }


    public function resetPasswordLoadAdmin(Request $request){
        $reserData = passwordResetAdmin::where('token', $request->token)->first();

        if(isset($request->token) && $reserData){

            $user = Admin::where('email', $reserData->email)->first();

            return view('Admin.SetNewPassword', compact('user'));

        }else{
            return view('Admin.404');
        }

    }



    public function resetPasswordAdmin(Request $request){
        $user = Admin::find($request->id);
       
        $user->password = Hash::make($request->password);
        $user->save();
        $delete = passwordResetAdmin::where('email', $user->email)->delete();
       return view('Admin.PasswordResetSuccess');
    }




    //---------------------------------



    // public function forgetPasswordAdmin(Request $request){

    //     $data = Admin::where('email', $request->email)->first();
    //     if(!$data){
    //         $errors = ['Email Doesn’t Match'];
    //         return redirect()->back()->withErrors($errors);
    //     }else{
    //         return view('Admin.SetNewPassword')->with(['id' => $data->id]);
    //     }
    // }

    // public function resetPasswordAdmin(Request $request, $id){
        
    //     $data = Admin::where('id', $id)->first();
    //     $hashdata = Hash::check($request->password,  $data->password);
    //     if($hashdata)
    //     {
    //         $errors = ['You Have entered old password, Please Enter new Password'];
    //         return redirect()->route('forgetpassword')->withErrors($errors);
    //         // return view('Admin.SetNewPassword')->withErrors(['id' => $data->id, 'errors' =>  $errors]);
    //     }

    //     $password = Hash::make($request->password);
    //     $update_data = Admin::where('id', $id)->update(['password' => $password]);

    //     if($update_data){
    //         return redirect()->route('resetPasswordSuccessfull');
       
    //     }


   // }

    // public function resetPasswordSuccessfull(){
    //     return view('Admin.PasswordReset');
    // }

    //change password

    public function changePassword(){
      
        return view('Admin.Setting');
    } 

    public function updatePassword(Request $request){
        $current_user = Auth::user();
        if(Hash::check($request->password,  $current_user->password)){
            $password_update = Hash::make($request->newpassword);
          
            $update_data = Admin::where('id', $current_user->id)->update(['password' => $password_update]);
           if($update_data){
                return redirect()->back()->with('success','Your password updated successfully');
            }

        }else{
            return redirect()->back()->with('error','Current password does not matched.');
        }


      
    }

    public function logoutAdmin(){
       
        $data = Auth::user();
        if ( $data ) {
            Auth::logout();
            return redirect()->route('login');
        }
     
    }



    public function profileLoadPage(){
        $admin_data = Auth::user();
        return view('Admin.profile', compact('admin_data'));
    }
    

    public function profileeditPage(){

    $admin = Auth::user()->id;

    $admin_data = Admin::where('id', $admin)->first();

        return view('Admin.profile-edit', compact('admin_data'));
    }

    public function UpdateProfileAdmin(Request $request){

        $validated = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required|numeric',
            'uploadPhoto' => 'image|mimes:jpg,png,jpeg',
            'uploadBackgroundPhoto' => 'image|mimes:jpg,png,jpeg'
        ]);

        $admin_id = Auth::user()->id;
        $admins = Admin::where('id', $admin_id)->first();
      

            
        $data = [
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phoneNumber' => $request->phoneNumber,
        ];
            if($admins->uploadPhoto){
                    if($request->file('uploadPhoto')) {
                        $image_name = $admins->uploadPhoto;
                        $image_path = public_path('Admin/uploadprofile/'.$image_name);
                        if(file_exists($image_path)){
                        unlink($image_path);
                        }

                        $filename = rand().'_'.$request->uploadPhoto->getClientOriginalName();
                        $request->uploadPhoto->move(public_path().'/Admin/uploadprofile', $filename);  
                        $fileName = $filename;
                        $data['uploadPhoto'] =  $fileName ;
                }
            }else{
                $filename = rand().'_'.$request->uploadPhoto->getClientOriginalName();
                $request->uploadPhoto->move(public_path().'/Admin/uploadprofile', $filename);  
                $fileName = $filename;
                $data['uploadPhoto'] =  $fileName ;
            }
                  
        //    $data['uploadPhoto'] =  $admins->uploadPhoto ;
        if($admins->uploadBackgroundPhoto){
            if($request->file('uploadBackgroundPhoto')) {
                $image_name2 = $admins->uploadBackgroundPhoto;
                $image_path2 = public_path('Admin/uploadprofile/'.$image_name2);
                if(file_exists($image_path2)){
                  unlink($image_path2);
                }

                $filename1 = rand().'_'.$request->uploadBackgroundPhoto->getClientOriginalName();
                $request->uploadBackgroundPhoto->move(public_path().'/Admin/uploadprofile', $filename1);  
                $fileName1 = $filename1;
                $data['uploadBackgroundPhoto'] =  $fileName1 ;
           }
        }else{
            $filename1 = rand().'_'.$request->uploadBackgroundPhoto->getClientOriginalName();
            $request->uploadBackgroundPhoto->move(public_path().'/Admin/uploadprofile', $filename1);  
            $fileName1 = $filename1;
            $data['uploadBackgroundPhoto'] =  $fileName1 ;
        }
        //    $data['uploadBackgroundPhoto'] =  $admins->uploadBackgroundPhoto;

        $update_admin = Admin::where('id', $admin_id)->update($data);
        // for profile picture
        $profilepic = Admin::where('id', Auth::id())->first();
        $profile_img =$profilepic->uploadPhoto; 
        $profile_image = Session::put('Admin_pic',    $profile_img);
        if($update_admin){
            return redirect()->back()->with('success','Your Profile update Successfully');
     
        }else{
        return redirect()->back()->with('error','Invalid details found, does not update');
        }
        // $admin_data->update($data);
    }

    public function allpages(){
        return view('Admin.allPages', $data);
    }
}