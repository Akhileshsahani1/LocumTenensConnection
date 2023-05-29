<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\Practice;
use App\Models\PracticeDetail;
use App\Models\Provider;
use App\Models\Admin;
use App\Models\Banner;
use App\Models\RaiseTicket;

use Session;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function dashboard(){
        $admin = Auth::user()->firstName;
        $data = Session::put('admin', $admin);
        $profilepic = Admin::where('id', Auth::id())->first();
        $profile_img =$profilepic->uploadPhoto; 
        $profile_image = Session::put('Admin_pic',    $profile_img);

        $data['practice_count'] = Practice::get()->count();
        $data['provider_count'] = Provider::get()->count();
        $data['recent_provider_data'] = Provider::orderBy('id', 'desc')->get()->take(3);
        $data['active_job_count'] = Provider::where('status', 1)->get()->count();
        return view('Admin.dashboard')->with($data);
    }




    public function provider(){
        $provider_data = Provider::where('status', 1)->get();
        return view('Admin.provider', compact('provider_data'));
    }

    public function getProviderDetailsById($id){
        $get_provider_details_by_id = Provider::find($id);
        return view('Admin.providerDetail', compact('get_provider_details_by_id'));
    }

    public function getProviderDetailsJson($id){
        $data = Provider::where('id', $id)->first();
        return response()->json($data);
    }

    public function updateProviderDetails(Request $request, $id){
            $data = [
                'firstName' => $request->firstName,
                'lastName' =>  $request->lastName,
                'practitioner_Type' => $request->practitioner_Type,
                'email' => $request->email,
                'phone' => $request->phone,
                'average_Daily_Rate' => $request->average_Daily_Rate,
            ];
        $dataupdate = Provider::where('id', $id)->update($data);
        if($dataupdate){
            return response()->json([
                'status' => '200',
                'message' => 'Provider Details update Successfully!'
            ]);
        }else{
            return response()->json([
                'status' => '400',
                'error' => 'Details is invalid'
            ]);
        }
    }

    public function ProviderSuspend($id){
     $suspend_user = Provider::where('id', $id)->update(['status' => 0]);
        if($suspend_user){
            return redirect()->back()->with('success','Provider suspend successfully !');
        }else{
        return redirect()->back()->with('error','Provider does not suspend!');
        }
}

public function DeleteProvider($id){
    
    $deleteProvider = Provider::find($id);   
    if(!empty($deleteProvider->upload_Photo))
    {
        $upload_photo_path = public_path('/provider/uploads/upload_photo/');
        $unlink_upload_photo_old = $upload_photo_path.$deleteProvider->upload_Photo;
        unlink($unlink_upload_photo_old);
    }
   

    if(!empty($deleteProvider->Virginia_Dental_File)){
        $upload_virginia_path = public_path('/provider/uploads/Virginia_Dental_File/');
        $unlink_virginia_old = $upload_virginia_path.$deleteProvider->Virginia_Dental_File;
        unlink($unlink_virginia_old);
    }
    if(!empty($deleteProvider->malpractices_Certificate)){
    $upload_malpractices_path = public_path('/provider/uploads/malpractices_Certificate/');
    $unlink_malpractices_old = $upload_malpractices_path.$deleteProvider->malpractices_Certificate;
    unlink($unlink_malpractices_old);
    }
    
    if(!empty($deleteProvider->dea_License)){
        foreach(explode(',',$deleteProvider->dea_License) as $deletefile)
        {
            $upload_dea_License_path = public_path('/provider/uploads/dea_License/');
            $unlink_dea_license_old = $upload_dea_License_path.$deletefile;
            unlink($unlink_dea_license_old);
        }
    }

    if($deleteProvider->delete()){
        return redirect()->back()->with('success','Provider delete successfully !');
    }else{
    return redirect()->back()->with('error','Provider does not delete!');
    }
}


    // practice

    
    public function practice(){

        $practice_data = Practice::where('status', 1)->get();
        return view('Admin.practice', compact('practice_data'));

    }

    public function practiceShowById($id){
       
        $practice_details = DB::table('practices')
            ->select("*")
            ->join('practice_details', 'practices.id', '=', 'practice_details.practice_id')
            ->where('practices.id', $id)
            ->where('practice_details.practice_id', $id)
            ->first();

            // dd($practice_details);
        return view('Admin.practiceDetail', compact('practice_details'));
    }


    public function getPracticeDetailsJson($id){
        $data = Practice::find($id);
        return response()->json($data);
    }

    public function updatePracticeDetails(Request $request, $id){
        $practice_update_data = [
            'firstName' => $request->firstName,
            'lastName' =>  $request->lastName,
            'email' => $request->email,
            'phoneNumber' => $request->phoneNumber
        ];
    $dataupdate_practice = Practice::where('id', $id)->update($practice_update_data);
    if($dataupdate_practice){
        return response()->json([
            'status' => '200',
            'message' => 'Practice update Successfully!'
        ]);
    }else{
        return response()->json([
            'status' => '400',
            'error' => 'Details is invalid'
        ]);
    }
    }

    public function updatePracticeStatus(Request $request,$id){
        $user = Practice::find($id);
        $user->status = 0;
        $user->save();
        $errors = ['Status change successfully'];
        return redirect()->back()->withErrors($errors);
    }


    public function PracticeSuspend($id){
    $suspend_practice = Practice::where('id', $id)->update(['status' => 0]);
    if($suspend_practice){
            return redirect()->back()->with('success',"Practice suspend successfully !");
        }else{
        return redirect()->back()->with('error','Practice does not suspend!');
    
        }
    }

    public function DeletePractice($id){

        $deletePractice = Practice::find($id);
        // $deletePractice->PracticeDetails()->each()->delete();
        $deletePractice->delete();
        if($deletePractice){
            return redirect()->back()->with('success','Practice delete successfully !');
        }else{
            return redirect()->back()->with('error','Practice does not delete!');
        }
    }
}