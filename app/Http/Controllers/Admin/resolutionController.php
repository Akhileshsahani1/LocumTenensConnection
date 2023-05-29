<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\PracticeRaseTicket;
use App\Models\AdminPracticeResolved;
use App\Models\AdminProviderTicketResolved;
use App\Models\providerRaiseTicket;
use Mail;
class resolutionController extends Controller
{

public function ResolutionsCases(){
  
    // raise tickets  provider
    $data['resolution_data'] = DB::table('providers')
    ->join('providerRaiseTicket', 'providers.id', '=', 'providerRaiseTicket.provider_id')
    ->where('ticketStatus', 1)
    ->get()->toArray();
    $resolution_data = [];

      foreach($data['resolution_data'] as $val1)
      {
          $resolution_data[] = $val1;
      }
   

    
    $data['resolution_data_close'] = DB::table('providers')
    ->join('providerRaiseTicket', 'providers.id', '=', 'providerRaiseTicket.provider_id')
     ->where('ticketStatus', 0)
    ->get()->toArray();


    $resolution_closedata = [];
    foreach($data['resolution_data_close'] as $val2)
    {
        $resolution_closedata[] = $val2;
    }
 // end raise tickets  provider

// practice resolution start
 $data['practice_resolution'] = DB::table('practices')
 ->join('practice_rase_tickets', 'practices.id', '=', 'practice_rase_tickets.practice_id')
->where('practice_raise_tickets_status', 1)
 ->get()->toArray();
    
    foreach($data['practice_resolution'] as $val3)
      {
          $resolution_data[] = $val3;
      }
 $data['practice_resolution_data_close'] = DB::table('practices')
 ->join('practice_rase_tickets', 'practices.id', '=', 'practice_rase_tickets.practice_id')
 ->where('practice_raise_tickets_status', 0)
 ->get()->toArray();
 foreach($data['practice_resolution_data_close'] as $val4)
 {
     $resolution_closedata[] = $val4;
 }
 
    return view('Admin.ResolutionsCases', ['resolution_data' => $resolution_data, 'resolution_closedata' =>$resolution_closedata]);
}

    public function UpdateTicketProvider(Request $request, $id){

        $fileName=[];
            if($request->file()) {
                $uploadedCount = 0;
                foreach($request->file('screenshort_resolved_provider') as $file)
                {
                    if ($uploadedCount < 10) { 
                   $filename = rand().'_'.$file->getClientOriginalName();
                   $file->move(public_path().'/provider/uploads/attachFile', $filename);  
                   $fileName[] = $filename;
                   $uploadedCount++;
                    }
                }
            
                $myString = implode(',',$fileName);
                
                AdminProviderTicketResolved::create([
                    'provider_id'=>$request->provider_id,
                    'ticket_id'=>$request->ticket_id,
                    'issue'=>$request->issue,
                    'admin_message'=>$request->admin_message,
                    'screenshort'=> $myString,
                    'provider_resolved_status'=> 0
                ])->save();  
           }else{
                AdminProviderTicketResolved::create([
                'provider_id'=>$request->provider_id,
                'ticket_id'=>$request->ticket_id,
                'issue'=>$request->issue,
                'admin_message'=>$request->admin_message,
                'screenshort'=> NULL,
                'provider_resolved_status'=> 0
                ]);
           }
        $resolvetickets_provider = providerRaiseTicket::where('id',$id)->update(['ticketStatus' => 0]);
          
        if($resolvetickets_provider){

            $data["email"] = $request->email;
         
            $data["title"] = "Resovled  Provider Issue";
            $data["body"] = "Your issue has been resolved please check at your panel";

            Mail::send("Admin.ProviderResolvedMail", ["data" => $data], function (
                $message
            ) use ($data) {
                $message->to($data["email"])->subject($data["title"]);
            });
            return redirect()->back()->with('success','Provider issue Resolved successfully !');
        }else{
        return redirect()->back()->with('error','Provider issue does not Resolved!');
        }
    }


    public function UpdateTicketPractice(Request $request,$id){
        
        // $validated = $request->validate([
        //     'admin_message' => 'required',
        // ]);
    //    $count =  count($request->screenshort_resolved_admin);
            $fileName=[];

            if($request->file()) {
                $uploadedCount = 0;

                foreach($request->file('screenshort_resolved_admin') as $file)
                {
                if ($uploadedCount < 10) { 
                    $filename = rand().'_'.$file->getClientOriginalName();
                    $file->move(public_path().'/Practice/', $filename);  
                    $fileName[] = $filename;
                    $uploadedCount++;
                  }
                  
                }
            
                $myString = implode(',',$fileName);
                
                 AdminPracticeResolved::create([
                    'practice_id'=>$request->practice_id,
                    'ticket_id'=>$request->ticket_id,
                    'issue'=>$request->issue,
                    'issue_date'=>$request->issue_date,
                    'admin_message'=>$request->admin_message,
                    'screenshort'=> $myString,
                    'practice_resolved_status'=> 0
                ])->save();  
           }else{
            AdminPracticeResolved::create([
                'practice_id'=>$request->practice_id,
                'ticket_id'=>$request->ticket_id,
                'issue'=>$request->issue,
                'issue_date'=>$request->issue_date,
                'admin_message'=>$request->admin_message,
                'screenshort'=> NULL,
                'practice_resolved_status'=> 0
            ]);  
           }
        $resolvetickets = PracticeRaseTicket::where('id',$id)->update(['practice_raise_tickets_status' => 0]);
          
        if($resolvetickets){

            $data["email"] = $request->email;
         
            $data["title"] = "Resovled  Practice Issue";
            $data["body"] = "Your issue has been resolved please check at your panel";

            Mail::send("Admin.PracticeResolvedMail", ["data" => $data], function (
                $message
            ) use ($data) {
                $message->to($data["email"])->subject($data["title"]);
            });
            return redirect()->back()->with('success','Practice issue Resolved successfully !');
        }else{
        return redirect()->back()->with('error','Practice issue does not Resolved!');
        }
    }


   

}
