<?php

namespace App\Http\Controllers\Practice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Practice;
use Illuminate\Support\Facades\Validator;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use App\Mail\PracticeMail;
use App\Models\PracticeDetail;
use App\Models\Practice_Type;
use App\Models\Practice_Position_Type;
use App\Models\Daily_Patient_Volume;
use App\Models\Practice_Working_Hour;
use App\Models\Practice_Location;
use App\Models\Practice_Language;
use App\Models\Practice_procedure_Type;
use App\Models\PracticeHire;
use Session;
use Cookie;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Models\PracticeResetPassword;
use App\Models\User;


class PracticeController extends Controller {

    public function home() {
        return view( 'Practice.welcome' );
    }

    public function signup_view() {

        return view( 'Practice.signup' );
    }

   
    public function signUp( Request $request ) 
    { 
        
        Cookie::queue('firstName',$request->firstName,10);
        Cookie::queue('lastName',$request->lastName,10);
        Cookie::queue('bio',$request->bio,10);
        Cookie::queue('clinicName',$request->clinicName,10);
        Cookie::queue('emails',$request->email,10);
        Cookie::queue('phoneNumber',$request->phoneNumber,10);
        Cookie::queue('state',$request->state,10);
        Cookie::queue('city',$request->city,10);
        Cookie::queue('zipCode',$request->zipCode,10);
        Cookie::queue('bio',$request->bio,10);
      
        $digits    = array_flip( range( '0', '9' ) );
        $lowercase = array_flip( range( 'a', 'z' ) );
        $uppercase = array_flip( range( 'A', 'Z' ) );

        $special   = array_flip( str_split( '!@#$%^&*()_+=-}{[}]\|;:<>?/' ) );
        $combined  = array_merge( $digits, $lowercase, $uppercase, $special );

        $password  = str_shuffle( array_rand( $digits ) .array_rand( $lowercase ) .array_rand( $uppercase ) . array_rand( $special ) .
        implode( array_rand( $combined, rand( 4, 8 ) ) ) );

          $alreadyexists = Practice::where('email',$request->email)->first();
          if($alreadyexists)
          {
            $data = Practice::where('email',$request->email)->Update( [
                'firstName' => $request->firstName,
                'lastName' =>$request->lastName,
                'bio'=>$request->bio,
                'clinicName' =>$request->clinicName,
                'phoneNumber' =>$request->phoneNumber,
                'state'=>$request->state,
                'city'=>$request->city,
                'zipCode'=>$request->zipCode,
                'status'=>1,
                
            ] );
            Cookie::queue('message1',"Please Complete your Registration Form!",10);
            return redirect()->route('signupProfessional.view');
         
          }
       
         $token = md5(uniqid());


        $datas = Practice::create( [
            'firstName' => $request->firstName,
            'lastName' =>$request->lastName,
            'bio'=>$request->bio,
            'clinicName' =>$request->clinicName,
            'email' =>$request->email,
            'phoneNumber' =>$request->phoneNumber,
            'password' =>Hash::make( $password ),
            'state'=>$request->state,
            'city'=>$request->city,
            'zipCode'=>$request->zipCode,
            'status'=>1,
            'userId'=>$token,
        ] )->save();
      $practice_data = Practice::where('email',$request->email)->first();
       $user = User::create([
            'name' => $request->firstName   ,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'Type_user'=>"Practice",
            'userId'=>$token,
        
        ]);
   
        if (  $user->save() ) 
        {

            $details = [
                'title'=>'mail from LOCUM',
                'body'=>$password
            ];    // email send to clinic for password
            $td = Mail::to( $request->email )->send( new PracticeMail( $details ) );
            
            if ( $td ) 
               {
                        
                 return redirect()->route('signupProfessional.view');
                } else {
                    return redirect()->route( 'signup_view' );
                }
        
                    
        }else {
            return redirect()->route( 'signup_view' );
        }
           
    }


      public function signupProfessionalview()
      {

        $practice = Practice::where('email',Cookie::get('emails'))->first();
        $check = PracticeDetail::where('practice_id',$practice->id)->first();
        if($check)
        {
            Cookie::queue('message2',"Please Complete your Registration Form!",10);
            return redirect()->route('ProfessionalDetailsView');
        }else{
                $practice_type = Practice_Type::select( 'practice_Type' )->get();
                $Position_Type = Practice_Position_Type::select( 'position_Type' )->get();
                $Patient_Volume = Daily_Patient_Volume::select( 'patient_volume' )->get();
                $Working_Hour = Practice_Working_Hour::select( 'working_Hours' )->get();
                $Practice_Location = Practice_Location::select( 'Location' )->get();
                return view('Practice.signupProfessional',['practice_type'=>$practice_type,'Position_Type'=>$Position_Type, 'Patient_Volume'=>$Patient_Volume, 'Working_Hour'=>$Working_Hour, 'Practice_Location'=>$Practice_Location ]);
            }
       
      }

      public function signupProfessionalprevious()
      {

            $practice_type = Practice_Type::select( 'practice_Type' )->get();

            $Position_Type = Practice_Position_Type::select( 'position_Type' )->get();
            
       
            $Patient_Volume = Daily_Patient_Volume::select( 'patient_volume' )->get();
            $Working_Hour = Practice_Working_Hour::select( 'working_Hours' )->get();
            $Practice_Location = Practice_Location::select( 'Location' )->get();
            return view('Practice.signupProfessional',['practice_type'=>$practice_type,'Position_Type'=>$Position_Type, 'Patient_Volume'=>$Patient_Volume, 'Working_Hour'=>$Working_Hour, 'Practice_Location'=>$Practice_Location ]);
          
       
      }
      
    /* ********************submit detail ***************************************************** */

    public function detailSubmit( Request $request )
    {
      
        Cookie::queue('practiceType',$request->practiceType,10);
        Cookie::queue('positionType',$request->positionType,10);
        Cookie::queue('patientVolume',$request->patientVolume,10);
        Cookie::queue('treat',$request->treat,10);
        Cookie::queue('workingHours',$request->workingHours,10);
        Cookie::queue('location',$request->location,10);
         
        $practice = Practice::where('email',Cookie::get('emails'))->first();
        $alreadyexists = PracticeDetail::where('practice_id',$practice->id)->first();
        if($alreadyexists)
        {
             PracticeDetail::where('practice_id',$practice->id)->Update( [
                'practiceType'=>$request->practiceType,
                'positionType'=>$request->positionType,
                'patientVolume'=>$request->patientVolume,
                'treat'=>$request->treat,
                'workingHours'=>$request->workingHours,
                'location'=>$request->location
            ] );
            return redirect()->route('ProfessionalDetailsView');
        }
        $data = PracticeDetail::create( [
                    'practice_id'=>$practice->id,
                    'practiceType'=>$request->practiceType,
                    'positionType'=>$request->positionType,
                    'patientVolume'=>$request->patientVolume,
                    'treat'=>$request->treat,
                    'workingHours'=>$request->workingHours,
                    'location'=>$request->location
                ] );
        if($data->save()){
            return redirect()->route('ProfessionalDetailsView');
        }else{
            abort(404, 'Page not found');
        }
      
      

    }

    public function ProfessionalDetailsView(Request $request)
    {
        $practice = Practice::where('email',Cookie::get('emails'))->first();
        $check = PracticeDetail::where( 'practice_id',  $practice->id )->first();
         if($check->language != '' && $check->amount != '' && $check->procedureType != '' && $check->qualities != '')
         {
            $id =  $practice->id;
            return view( 'Practice.termofservices', compact( 'id' ) );
         }else{
            $language = Practice_Language::select( 'Language' )->get();
            $procedure_type = Practice_procedure_Type::select( 'procedure__Type' )->get();
            return view('Practice.professionalDetails',['language'=>$language, 'procedure_type'=>$procedure_type ]);
         }
        
    }
    /* ********************submit ProfessionalDetailSubmit ***************************************************** */

    public function ProfessionalDetailSubmit( Request $request ) {
               
        
        $practice = Practice::where('email',Cookie::get('emails'))->first();
        $check = PracticeDetail::where('practice_id', $practice->id )->first();

            $data = PracticeDetail::where( 'practice_id', $check->practice_id)->update( [
                'language'=>$request->language,
                'amount'=>$request->amount,
                'procedureType'=>$request->procedureType,
                'qualities'=>$request->qualities,
            ] );
            if ( $data ) {
                  $id = $check->practice_id;

                  return view( 'Practice.termofservices', compact( 'id' ) );
              }else{
                abort(404, 'Page not found');
              }
       
    }

    /* ***********************Practice ForgetPassword  *******************************  */

    public function forgetView( Request $request ) {
        return view( 'Practice.forgetpassword' );

    }

    /** ***************************** Email match********************************************** */

    public function matchEmail( Request $request ) {
        $email = Practice::where( 'email', $request->email )->first();
       
        if ( $email ) {
            $id = $email->id;
            $token = Str::random(40);
            $domain = URL::to("/");
            $url =
                $domain .
                "/practice/resetview?token=" .
                $token;

            $data["url"] = $url;
            $data["email"] = $request->email;
            $data["title"] = "Password Reset";
            $data["body"] =
                "Please click on below link to reset your password";

            Mail::send("Provider.mailforget", ["data" => $data], function (
                $message
            ) use ($data) {
                $message->to($data["email"])->subject($data["title"]);
            });
             
        
            $result = PracticeResetPassword::updateOrCreate([
                    "email" => $request->email,
                    "token" => $token,
                   
                ])->save();
              
            return back()->with(
                "success",
                "Please check your mail to reset your password"
            );
        } else {
            
            $errors = [ 'Email does not Match' ];
            return redirect()->back()->withErrors( $errors );
        }

    }

   
     public function resetview(Request $request)
     {
        $resetdata = PracticeResetPassword::where("token", $request->token)->first();
           if($resetdata)
           {
                $user = Practice::where("email",$resetdata->email)->first();
                $id =  $user->id;
                return view("Practice.ResetPassword",["id"=>$id,"tokens"=>$resetdata->token]);
           }else{
                  abort(404);
           }
           
      
         
     }
    /** ***************************** Reset Password ********************************************** */

    public function resetPassword( Request $request,$id) {
                  
        if ( $request->password == $request->c_password ) {
           
            Practice::where('id', $id )->update( [ 'password'=>Hash::make( $request->password ) ] );
            $resetdata = PracticeResetPassword::where("token", $request->tokens)->update([
                'token'=>0
            ]);
            return view( 'Practice.success' );
        } else {
            $errors = [ 'Password does not match' ];
            return redirect()->back()->withErrors( $errors );
        }

    }

    public function success() {

        return redirect()->route( 'practice.home' );
    }

    public function logout(Request $request) {
      
        $data = Auth::user();
        if ( $data ) {
            Auth::logout();
            Session::forget('user_session');
            return redirect()->route('practice.home');
        }

    }

    public function PracticeHire(Request $request)
    {
        $userid = auth()->user()->id;
        $posts['user'] = Practice::where('id', $userid)->first();
           
        $data = PracticeHire::create([
                        'practice_id'=>$userid,
                        'provider_id'=>$request->provider_id,
                        'start_date'=>$request->start_date,
                        'end_date'=>$request->end_date
                  ])->save();
               
        return view('Practice.ConifrmPay', $posts);
           
    }

}
 