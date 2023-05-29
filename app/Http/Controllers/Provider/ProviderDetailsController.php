<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\providerState;
use App\Models\providerCity;
use App\Models\Practice;
use App\Models\PracticeDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Auth;
use Hash;
use Session;

class ProviderDetailsController extends Controller {
    
    public function getCityById(Request $req)
    {
      $sid = $req->post('sid');
      $city = DB::table('providerCity')->where('state_id', $sid)->orderBy('city', 'asc')->get();
      $html = '<option value="">Select city</option>';
      foreach ($city as $list) {
        $html .= '<option value="' . $list->id . '">' . $list->city . '</option>';
      }
      echo $html;
    }


    public function profileLoad() {
        $userid = Auth::id();
        $data['state'] = providerState::get();
        $data['city'] = providerCity::get();
        $data['user'] = Provider::where('id', $userid )->first();
        // $posts = Provider::where('id', $userid )->first();
        return view( 'Provider.profile', $data);
    }

    public function profileLoadedit() {
        $userid = Auth::id();
        $user = Provider::where( 'id', $userid )->first();
        // $PracticeDetail = DB::table( 'practices' )->select( 'practices.*', 'practice_details.*' )
        // ->join( 'practice_details', 'practices.id', '=', 'practice_details.practice_id' )
        // ->get();
        //dd( $PracticeDetail );
        $PracticeDetail = Practice::with( 'practiceDetails' )->where('id',$id)->first();
        
        return view('Provider.profileClinicDetails',[ 'user'=>$user, 'practices'=>$PracticeDetail] );
    }

    public function ProviderClinicShow($id) {
        //dd( 'dddd' );
        $userid = Auth::id();
        $user = Provider::where( 'id', $userid )->first();

        // $PracticeDetail = DB::table( 'practices' )->select( 'practices.*', 'practice_details.*' )
        // ->join( 'practice_details', 'practices.id', '=', 'practice_details.practice_id' )
        // ->get();
        //dd( $PracticeDetail );

        $PracticeDetails = Practice::with( 'practiceDetails' )
        ->where('id', $id)
        ->first();
        // dd($PracticeDetail);


        // $data['practices'] = Practice::where('id', $id)->first();
        // $data['practice_details'] = PracticeDetail::where('practice_id', $id)->first();
        
        return view('Provider.profileClinicDetails',[ 'user'=>$user, 'practices'=>$PracticeDetails] );
    }

    public function profileUpdates( Request $req, $id ) {

        $req->validate( [
            //step 1
            'firstName' => 'required|max:30',
            'lastName' => 'required|max:30',
            'email' => 'required|Email',
            'phone' => 'required|min:12|numeric',
            'state'=>'required',
            'city'=>'required',
            'zipcode'=>'required |min:5|max:6',
            //step 2
            'upload_Photo'=>'mimes:jpeg,jpg,png',
            'Virginia_Dental_File'=>'mimes:jpeg,jpg,png',
            'malpractices_Certificate'=>'mimes:jpeg,jpg,png',
            // 'dea_License'=>'mimes:jpeg,jpg,png',
            //step 3
            'practitioner_Type'=>'required',
            'position_Type'=>'required',
            'start_Date'=>'required',
            'end_Date'=>'required',
            'primary_Handedness'=>'required',
            //step 4
            'distance_Willing_To_Travel_One_Way'=>'required',
            'peferred_Daily_Working_Hours'=>'required',
            'preferred_Daily_Patient_Volume'=>'required',
            'are_You_Willing_Overnight'=>'required',
            'professional_Experience'=>'required',
            'booking_Availability_Requirements'=>'required',
            'preferred_Region'=>'required',
            //step 5
            'available_Days'=>'required',
            'procedure_Type'=>'required',
            'advanced_Degree_Licences'=>'required',
            'comfortable_Treating_Children'=>'required',
            'qualities_Practice_Environment'=>'required',
            'average_Daily_Rate'=>'required',
            'average_hour_rate'=>'required',
            'description' => 'required'
        ] );
        $current_user = Auth::id();

        $provider_data = Provider::find($id);


        if ($req->hasFile('upload_Photo')) {
            $image = $req->file('upload_Photo');
            $filename = rand() . '.' . $image->getClientOriginalExtension();
            $image_path2 = public_path('/provider/uploads/upload_photo/'.$provider_data->upload_Photo);
            if(file_exists($image_path2) && !empty($provider_data->upload_Photo)){
                unlink($image_path2);
            }
            $path = $image->move(public_path('/provider/uploads/upload_photo'), $filename);
            $fileName_upload_image = $filename;
        }else{
            $fileName_upload_image = $provider_data->upload_Photo;
        }


        if ($req->hasFile('Virginia_Dental_File')) {
            $image = $req->file('Virginia_Dental_File');
            $filename = rand() . '.' . $image->getClientOriginalExtension();
            $image_path2 = public_path('/provider/uploads/Virginia_Dental_File/'.$provider_data->Virginia_Dental_File);
            if(file_exists($image_path2) && !empty($provider_data->Virginia_Dental_File)){
                unlink($image_path2);
            }
            $path = $image->move(public_path('/provider/uploads/Virginia_Dental_File'), $filename);
            $fileName_Virginia_Dental = $filename;
        }else{
            $fileName_Virginia_Dental = $provider_data->Virginia_Dental_File;
        }

        if ($req->hasFile('malpractices_Certificate')) {
            $image = $req->file('malpractices_Certificate');
            $filename = rand() . '.' . $image->getClientOriginalExtension();
            $image_path2 = public_path('/provider/uploads/malpractices_Certificate/'.$provider_data->malpractices_Certificate);
            if(file_exists($image_path2) && !empty($provider_data->malpractices_Certificate)){
                unlink($image_path2);
            }
            $path = $image->move(public_path('/provider/uploads/malpractices_Certificate'), $filename);
            $malpractices_Certificate = $filename;
        }else{
            $malpractices_Certificate = $provider_data->malpractices_Certificate;
        }


        $fileName_de_licence = [];

        if ($req->hasFile('dea_License')) {
            foreach ($req->file('dea_License') as $file) {
                $filename = rand() . '.' . $file->getClientOriginalExtension();
                $existing_filenames = explode(',', $provider_data->dea_License);
                foreach ($existing_filenames as $existing_filename) {
                    $image_path2 = public_path('/provider/uploads/dea_License/'.$existing_filename);
                    if (file_exists($image_path2) && !empty($existing_filename)) {
                        unlink($image_path2);
                    }
                }
                $path = $file->move(public_path('/provider/uploads/dea_License'), $filename);
                $fileName_de_licence[] = $filename;
            }
        } else {
            $fileName_de_licence = explode(',', $provider_data->dea_License);
        }


        $de_licence = implode( ',', $fileName_de_licence );
        $data_step = implode( ',', $req->preferred_Region );
        Cookie::queue( 'preferred_Region', implode( ',', $req->preferred_Region ), 10 );
        Cookie::queue( 'available_Days', implode( ',', $req->available_Days ), 10 );
        Cookie::queue( 'procedure_Type', implode( ',', $req->procedure_Type ), 10 );
        Cookie::queue( 'advanced_Degree_Licences', implode( ',', $req->advanced_Degree_Licences ), 10 );
        $userupdate = Provider::where( 'id', $current_user )->update( [
            //step 1
            'firstName'=>$req->firstName,
            'lastName'=>$req->lastName,
            'email'=>$req->email,
            'phone'=>$req->phone,
            'state'=>$req->state,
            'city'=>$req->city,
            'zipcode'=>$req->zipcode,
            //step 2
            'upload_Photo'=>$fileName_upload_image,
            'Virginia_Dental_File'=>$fileName_Virginia_Dental,
            'malpractices_Certificate'=>$malpractices_Certificate,
            'dea_License'=>$de_licence,
            //step 3
            'practitioner_Type'=>$req->practitioner_Type,
            'position_Type'=>$req->position_Type,
            'start_Date'=>$req->start_Date,
            'end_Date'=>$req->end_Date,
            'primary_Handedness'=>$req->primary_Handedness,
            //step 4
            'distance_Willing_To_Travel_One_Way'=>$req->distance_Willing_To_Travel_One_Way,
            'peferred_Daily_Working_Hours'=>$req->peferred_Daily_Working_Hours,
            'preferred_Daily_Patient_Volume'=>$req->preferred_Daily_Patient_Volume,
            'are_You_Willing_Overnight'=>$req->are_You_Willing_Overnight,
            'professional_Experience'=>$req->professional_Experience,
            'description' => $req->description,
            'booking_Availability_Requirements'=>$req->booking_Availability_Requirements,
            'preferred_Region'=>implode( ',', $req->preferred_Region ),
            //step 5
            'available_Days' => implode( ',', $req->available_Days ),
            'procedure_Type' => implode( ',', $req->procedure_Type ),
            'advanced_Degree_Licences' => implode( ',', $req->advanced_Degree_Licences ),
            'comfortable_Treating_Children'=>$req->comfortable_Treating_Children,
            'qualities_Practice_Environment'=>$req->qualities_Practice_Environment,
            'average_Daily_Rate'=>$req->average_Daily_Rate,
            'average_hour_rate'=>$req->average_hour_rate,
            'dailyneeds_GloveSize' => $req->dailyneeds_GloveSize,
            'dailyneeds_SpecialNeeds' => $req->dailyneeds_SpecialNeed
        ] );
        if ( $userupdate ) {
            return back()->with( 'success', ' Updated Profile detail form !' );

        } else {
            return back()->with( 'error', 'Not Profile Updated detail !' );
        }

        return view('Provider.editProfile', $posts );

    }

    //

}