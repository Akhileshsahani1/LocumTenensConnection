<?php

namespace App\Http\Controllers\Provider;

use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Provider;
use App\Models\ProviderAvialability;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use App\Mail\PracticeMail;
use App\Mail\providerRegister;
use App\Models\User;
use App\Models\Providerterm;

use Hash;
use Session;
use Http;
use DB;

class ProviderRegistercontroller extends Controller
{

  public function getCity(Request $req)
  {
    $sid = $req->post('sid');
    $city = DB::table('providerCity')->where('state_id', $sid)->orderBy('city', 'asc')->get();
    $html = '<option value="">Select city</option>';
    foreach ($city as $list) {
      $html .= '<option value="' . $list->id . '">' . $list->city . '</option>';
    }
    echo $html;
  }

  //

  public function registrationStepFirst()
  {
    $data = DB::table('providerState')->orderBy('state', 'asc')->get();
    $city = DB::table('providerCity')->orderBy('city', 'asc')->get();
    return view('Provider.signupStepFirst', ['providerState' => $data, 'providerCity' => $city]);
  }


  public function termscondition()
  {
    $providerstepfive = Provider::where('email', Cookie::get('email'))->first();
    $id = $providerstepfive->id;

   
    return view('Provider.termsCondition', compact('id'));
  }

  public function updateServices(){
    
  }

  public function createSubmitStepFirst(Request $request)
  {
    Cookie::queue('firstName', $request->firstName, 10);
    Cookie::queue('lastName', $request->lastName, 10);
    Cookie::queue('email', $request->email, 10);
    Cookie::queue('phone', $request->phone, 10);
    Cookie::queue('password', $request->password, 10);
    Cookie::queue('state', $request->state, 10);
    Cookie::queue('city', $request->city, 10);
    Cookie::queue('zipcode', $request->zipcode, 10);
    $alreadyexists = Provider::where('email', $request->email)->first();

    if ($alreadyexists != NULL) {

      $data_stepfirst = Provider::where('email', $request->email)->Update([
        'firstName' => $request->firstName,
        'lastName' => $request->lastName,
        'email' => $request->email,
        'phone' => $request->phone,
        'state' => $request->state,
        'city' => $request->city,
        'zipcode' => $request->zipcode

      ]);
      return redirect()->route('Provider.signupStepSecond')->with('successmessage', 'Please Complete Your Registration Form!');
    }


    $digits = array_flip(range('0', '9'));
    $lowercase = array_flip(range('a', 'z'));
    $uppercase = array_flip(range('A', 'Z'));

    $special = array_flip(str_split('!@#$%^&*()_+=-}{[}]\|;:<>?/'));
    $combined = array_merge($digits, $lowercase, $uppercase, $special);

    $password = str_shuffle(array_rand($digits) . array_rand($lowercase) . array_rand($uppercase) . array_rand($special) .
      implode(array_rand($combined, rand(4, 8))));

    $token = md5(uniqid());

    $data_stepfirsts = Provider::create([
      'firstName' => $request->firstName,
      'lastName' => $request->lastName,
      'email' => $request->email,
      'phone' => $request->phone,
      'password' => Hash::make($password),
      'state' => $request->state,
      'city' => $request->city,
      'zipcode' => $request->zipcode,
      'userId' => $token,
      'status' => 1
    ]);

    $user = User::create([
      'name' => $request->firstName,
      'email' => $request->email,
      'password' => Hash::make($password),
      'Type_user' => 'Provider',
      'userId' => $token,

    ])->save();
    if ($data_stepfirsts->save()) {

      $details = [
        'title' => 'mail from LOCUM Tenese Connections',
        'body' => $password
      ]; // email send to clinic for password
      $td = Mail::to($request->email)->send(new providerRegister($details));
      return redirect()->route('Provider.signupStepSecond');
    } else {
      return redirect()->route('Provider.signupStepFirst');
    }
  }

  public function registrationStepSecond()
  {
    $provider_stepsecond = Provider::where('email', Cookie::get('email'))->first();
    if ($provider_stepsecond->practitioner_Type != Null) {
      return redirect()->route('Provider.signupStepThird')->with('successmessage', 'Please Complete Your Registration Form!');
    } else {
      return view('Provider.signupStepSecond');
    }
  }

  public function createSubmitStepSecond(Request $request)
  {

    Cookie::queue('practitioner_Type', $request->practitioner_Type, 10);
    Cookie::queue('position_Type', $request->position_Type, 10);
    Cookie::queue('start_Date', $request->start_Date, 10);
    Cookie::queue('end_Date', $request->end_Date, 10);
    Cookie::queue('primary_Handedness', $request->primary_Handedness, 10);
    Cookie::queue('distance_Willing_To_Travel_One_Way', $request->distance_Willing_To_Travel_One_Way, 10);
    Cookie::queue('peferred_Daily_Working_Hours', $request->peferred_Daily_Working_Hours, 10);

    $providerstepsecond = Provider::where('email', Cookie::get('email'))->first();
    //dd( $providerstepsecond );

    $bookid = rand();

    ProviderAvialability::create([
      'event_name' => 'available',
      'event_start' => $request->start_Date,
      'event_end' => $request->end_Date,
      'bookingid' => $bookid,
      'color' => '#3788d8',
      'status' => '1',
      'userid' => $providerstepsecond->id,

    ]);

    if ($providerstepsecond) {
      $data_stepsecond = Provider::where('id', $providerstepsecond->id)->Update([
        'practitioner_Type' => $request->practitioner_Type,
        'position_Type' => $request->position_Type,
        'start_Date' => $request->start_Date,
        'end_Date' => $request->end_Date,
        'primary_Handedness' => $request->primary_Handedness,
        'distance_Willing_To_Travel_One_Way' => $request->distance_Willing_To_Travel_One_Way,
        'peferred_Daily_Working_Hours' => $request->peferred_Daily_Working_Hours
      ]);

      return redirect()->route('Provider.signupStepThird');

    }
  }
  
   public function ThirdStep()
   {
     return view('Provider.signupStepSecond');
   }
  public function registrationStepThird()
  {
    $provider_stepsecond = Provider::where('email', Cookie::get('email'))->first();
    if ($provider_stepsecond->preferred_Daily_Patient_Volume != Null) {
      return redirect()->route('Provider.signupStepFour')->with('successmessage', 'Please Complete Your Registration Form!');
    } else {
      return view('Provider.signupStepThird');
    }
   
  }

  public function createSubmitStepThird(Request $request)
  {

    $data_step = implode(',', $request->preferred_Region);

    Cookie::queue('preferred_Daily_Patient_Volume', $request->preferred_Daily_Patient_Volume, 10);
    Cookie::queue('are_You_Willing_Overnight', $request->are_You_Willing_Overnight, 10);
    Cookie::queue('professional_Experience', $request->professional_Experience, 10);
    Cookie::queue('booking_Availability_Requirements', $request->booking_Availability_Requirements, 10);
    Cookie::queue('dailyneeds_LatexAllergy', $request->dailyneeds_LatexAllergy, 10);
    Cookie::queue('dailyneeds_GloveSize', $request->dailyneeds_GloveSize, 10);
    Cookie::queue('dailyneeds_SpecialNeeds', $request->dailyneeds_SpecialNeeds, 10);
    Cookie::queue('preferred_Region', implode(',', $request->preferred_Region), 10);

  
    $providerstepthird = Provider::where('email', Cookie::get('email'))->first();
    if ($providerstepthird) {
      $data_stepthird = Provider::where('id', $providerstepthird->id)->Update([
        'preferred_Daily_Patient_Volume' => $request->preferred_Daily_Patient_Volume,
        'are_You_Willing_Overnight' => $request->are_You_Willing_Overnight,
        'professional_Experience' => $request->professional_Experience,
        'booking_Availability_Requirements' => $request->booking_Availability_Requirements,
        'dailyneeds_LatexAllergy' => $request->dailyneeds_LatexAllergy,
        'dailyneeds_GloveSize' => $request->dailyneeds_GloveSize,
        'dailyneeds_SpecialNeeds' => $request->dailyneeds_SpecialNeeds,
        'preferred_Region' => implode(',', $request->preferred_Region),
      ]);

      return redirect()->route('Provider.signupStepFour');

    }
  }

  public function registrationStepFour()
  {
      $provider_stepsecond = Provider::where('email', Cookie::get('email'))->first();
      if ($provider_stepsecond->available_Days != Null) {
        return redirect()->route('signupStepFive')->with('successmessage','Please Complete Your Registration Form!');
      } else {
          return view('Provider.signupStepFour');
      }
     
  }

  
   public function PreviousStepFour()
   {
      return view('Provider.signupStepThird');
   }
  public function createSubmitStepFour(Request $request)
  {

     Cookie::queue( 'available_Days', implode( ',', $request->available_Days ), 10 );
     Cookie::queue( 'procedure_Type', implode( ',', $request->procedure_Type ), 10 );
     Cookie::queue( 'advanced_Degree_Licences', implode( ',', $request->advanced_Degree_Licences ), 10);
     Cookie::queue( 'comfortable_Treating_Children', $request->comfortable_Treating_Children, 10 );
     Cookie::queue( 'qualities_Practice_Environment', $request->qualities_Practice_Environment, 10 );
     Cookie::queue( 'average_Daily_Rate', $request->average_Daily_Rate, 10 );
     Cookie::queue( 'average_hour_rate', $request->average_hour_rate, 10 );

    // Session::put('available_Days', $request->available_Days);
    // Session::put('procedure_Type', $request->procedure_Type);
    // Session::put('advanced_Degree_Licences', $request->advanced_Degree_Licences);
    // Session::put('comfortable_Treating_Children', $request->comfortable_Treating_Children);
    // Session::put('qualities_Practice_Environment', $request->qualities_Practice_Environment);
    // Session::put('average_Daily_Rate', $request->average_Daily_Rate);
    // Session::put('average_hour_rate', $request->average_hour_rate);

    $providerstepfour = Provider::where('email', Cookie::get('email'))->first();

    if ($providerstepfour) {
      $data = Provider::where('id', $providerstepfour->id)->Update([
        'available_Days' => implode(',', $request->available_Days),
        'procedure_Type' => implode(',', $request->procedure_Type),
        'advanced_Degree_Licences' => implode(',', $request->advanced_Degree_Licences),
        'comfortable_Treating_Children' => $request->comfortable_Treating_Children,
        'qualities_Practice_Environment' => $request->qualities_Practice_Environment,
        'average_Daily_Rate' => $request->average_Daily_Rate,
        'average_hour_rate' => $request->average_hour_rate,
      ]);

      return redirect()->route('signupStepFive');

    }else{
         abort(404);
    }
  }

  public function registrationStepFive(Request $request)
  {
    $provider_stepsecond = Provider::where('email', Cookie::get('email'))->first();
    if ($provider_stepsecond->upload_Photo != Null) {
      return redirect()->route('Provider.termsCondition', ['id' =>  $provider_stepsecond->id]);
    } else {
      return view('Provider.signupStepFive');
    }
   
  }

  public function createSubmitStepFive(Request $request)
  {
    if ($request->file()) {
      $filename = rand() . '_' . $request->upload_Photo->getClientOriginalName();
      $request->upload_Photo->move(public_path() . '/provider/uploads/upload_photo', $filename);

      $fileName_upload_image = $filename;
    }

    $file_data = Cookie::make('photo_upload', $fileName_upload_image, 10);
    //upload image
    if ($request->file()) {
      $filename = rand() . '_' . $request->Virginia_Dental_File->getClientOriginalName();
      $request->Virginia_Dental_File->move(public_path() . '/provider/uploads/Virginia_Dental_File', $filename);

      $fileName_Virginia_Dental = $filename;
    }
    if ($request->file()) {
      $filename = rand() . '_' . $request->malpractices_Certificate->getClientOriginalName();
      $request->malpractices_Certificate->move(public_path() . '/provider/uploads/malpractices_Certificate', $filename);

      $malpractices_Certificate = $filename;
    }
    //multiple-de-licence
    $fileName_de_licence = [];
    if ($request->file()) {
      foreach ($request->file('dea_License') as $file) {
        $filename = rand() . '_' . $file->getClientOriginalName();
        $file->move(public_path() . '/provider/uploads/dea_License', $filename);

        $fileName_de_licence[] = $filename;
      }
    }
    $de_licence = implode(',', $fileName_de_licence);
    $providerstepfive = Provider::where('email', Cookie::get('email'))->first();
    $id = $providerstepfive->id;
    

    if ($providerstepfive) {
      $data = Provider::where('id', $providerstepfive->id)->Update([
        'upload_Photo' => $fileName_upload_image,
        'Virginia_Dental_File' => $fileName_Virginia_Dental,
        'malpractices_Certificate' => $malpractices_Certificate,
        'dea_License' => $de_licence,
        'description' => $request->description,
      ]);

        

      // forget cookies


      // Cookie::queue('firstName',Null, -1);
      // Cookie::queue('lastName',Null, -1);
      // Cookie::queue('email',Null, -1);
      // Cookie::queue('phone',Null,-1);
      // Cookie::queue('password',Null,-1);
      // Cookie::queue('state',Null,-1);
      // Cookie::queue('city', Null, -1);
      // Cookie::queue('zipcode', Null, -1);

      // second step

      // Cookie::queue('practitioner_Type',Null, -1);
      // Cookie::queue('position_Type', Null, -1);
      // Cookie::queue('start_Date', Null, -1);
      // Cookie::queue('end_Date', Null, -1);
      // Cookie::queue('primary_Handedness', Null, -1);
      // Cookie::queue('distance_Willing_To_Travel_One_Way', Null, -1);
      // Cookie::queue('peferred_Daily_Working_Hours', Null, -1);

      // step third

      // Cookie::queue('preferred_Daily_Patient_Volume', Null, -1);
      // Cookie::queue('are_You_Willing_Overnight', Null, -1);
      // Cookie::queue('professional_Experience', Null, -1);
      // Cookie::queue('booking_Availability_Requirements', Null, -1);
      // Cookie::queue('dailyneeds_LatexAllergy', Null, -1);
      // Cookie::queue('dailyneeds_GloveSize', Null, -1);
      // Cookie::queue('dailyneeds_SpecialNeeds', Null, -1);
      // Cookie::queue('preferred_Region',Null, -1);

      // four step 

    //  Cookie::queue( 'available_Days',Null, -1 );
    //  Cookie::queue( 'procedure_Type',Null, -1 );
    //  Cookie::queue( 'advanced_Degree_Licences',Null, -1);
    //  Cookie::queue( 'comfortable_Treating_Children', Null, -1 );
    //  Cookie::queue( 'qualities_Practice_Environment',Null, -1 );
    //  Cookie::queue( 'average_Daily_Rate',Null, -1 );
    //  Cookie::queue( 'average_hour_rate',Null, -1 );

      return redirect()->route('Provider.termsCondition');

      // return view('Provider.termsCondition', compact('id'));

    }
  }

  public function PreviousStepFive()
  {
    return view('Provider.signupStepFour');
  }



  public function termsService(Request $request){
    $data = Providerterm::where('provider_id', $request->id)->first();
    if ($data) {
      Providerterm::where('provider_id', $request->id)->update(['terms_service' => $request->title]);
    } else {

        $term = Providerterm::create(['provider_id' => $request->id, 'terms_service' => $request->title]);
        if ($term->save()) {
            return response()->json([
                'status' => 'success',
            ], 200);
        }
    }
  }


  public function privacyPolicy(Request $request){
    $data = Providerterm::where('provider_id', $request->id)->first();
    

    if ($data) {
      Providerterm::where('provider_id', $request->id)->update(['privacy_policy' => $request->privacy_Policy]);
    } else {

        $term = Providerterm::create(['provider_id' => $request->id, 'privacy_policy' => $request->privacy_Policy]);
        if ($term->save()) {
            return response()->json([
                'status' => 'success',
            ], 200);
        }
    }
  }


  public function propaymentMethod(Request $request){
    $data = Providerterm::where('provider_id', $request->id)->first();
    if ($data) {
      Providerterm::where('provider_id', $request->id)->update(['payment_methods' => $request->payment_methods]);
    } else {
        $term = Providerterm::create(['provider_id' => $request->id, 'payment_methods' => $request->payment_methods]);
        if ($term->save()) {
            return response()->json([
                'status' => 'success',
            ], 200);
        }
    }
  }


  public function proLiability(Request $request){
    $data = Providerterm::where('provider_id', $request->id)->first();
    if ($data) {
      Providerterm::where('provider_id', $request->id)->update(['liability' => $request->liability]);
    } else {
        $term = Providerterm::create(['provider_id' => $request->id, 'liability' => $request->liability]);
        if ($term->save()) {
            return response()->json([
                'status' => 'success',
            ], 200);
        }
    }
  }



}