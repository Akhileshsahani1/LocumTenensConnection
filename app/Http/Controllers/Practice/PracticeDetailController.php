<?php

namespace App\Http\Controllers\Practice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Term;
use App\Models\Provider;
use App\Models\Practice;
use App\Models\Practice_Type;
use App\Models\Practice_Language;
use App\Models\Practice_Working_Hour;
use App\Models\PracticeDetail;
use App\Models\PracticeRaseTicket;
use App\Models\AdminPracticeResolved;
use App\Models\ProviderAvialability;
use Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;



class PracticeDetailController extends Controller
{
    /** ajax terms store data  */

    public function terms_service(Request $request)
    {

        $data = Term::where('practice_id', $request->id)->first();
        if ($data) {
            Term::where('practice_id', $request->id)->update(['terms_service' => $request->title]);
        } else {

            $term = Term::create(['practice_id' => $request->id, 'terms_service' => $request->title]);
            if ($term->save()) {
                return response()->json([
                    'status' => 'success',
                ], 200);
            }
        }
    }

    /** store data previcy and policy */

    public function privacy_Policy(Request $request)
    {

        $data = Term::where('practice_id', $request->id)->first();
        if ($data) {
            Term::where('practice_id', $request->id)->update(['privacy_Policy' => $request->privacy_Policy]);
        }
    }

    public function payment_Methods(Request $request)
    {

        $data = Term::where('practice_id', $request->id)->first();
        if ($data) {
            Term::where('practice_id', $request->id)->update(['payment_Methods' => $request->payment_Methods]);
        }
    }

    public function liability(Request $request)
    {

        $data = Term::where('practice_id', $request->id)->first();
        if ($data) {
            Term::where('practice_id', $request->id)->update(['liability' => $request->liability]);
        }
    }

    public function dashboard()
    {

        $posts['posts'] = Provider::all();
        $userid = auth()->user()->id;
        $posts['user'] = Practice::where('id', $userid)->first();

        return view('Practice.dashboard', $posts);
    }

    public function personaldetails($id)
    {
        $user = Auth::user();
        $users = Provider::where('id', $id)->first();
        $provideravailable_available = ProviderAvialability::where('userid', $id)->where('event_name', "available")->get();
        $provideravailable_busy = ProviderAvialability::where('userid', $id)->where('event_name', "busy")->get();
        //$provideravailable_available2 = ProviderAvialability::where('userid', $id)->where('event_name', "available")->get();
        return view('Practice.personaldetails', ['user' => $user, 'users' => $users, 'provideravailable_available' => $provideravailable_available, 'provideravailable_busy' => $provideravailable_busy]);
    }





    public function myprofile()
    {
        $id = Auth::id();
        $user = Practice::where('id', $id)->first();

        $user['practiceDetails'] = PracticeDetail::where('practice_id', $id)->first();
          
        return view('Practice.profiledetails', compact('user'));
    }

    public function myprofileedit()
    {

        $userid = auth()->user()->id;

        $user = Practice::where('id', $userid)->first();
        $language = Practice_Language::select('Language')->get();
        $practice_type = Practice_Type::select('practice_Type')->get();
        $Working_Hour = Practice_Working_Hour::select('working_Hours')->get();
        $practiceDetail = PracticeDetail::where('practice_id', $userid)->first();

        return view('Practice.profiledetailsedit', ['user' => $user, 'practice_type' => $practice_type, 'language' => $language, 'Working_Hour' => $Working_Hour, 'practiceDetail' => $practiceDetail]);
    }

    public function privacypolicy()
    {
        $userid = auth()->user()->id;
        $posts['user'] = Practice::where('id', $userid)->first();
        return view('Practice.Privacy', $posts);
    }

    public function paymentmethods()
    {
        $userid = auth()->user()->id;
        $posts['user'] = Practice::where('id', $userid)->first();
        return view('Practice.paymentmethods', $posts);
    }

    public function terms()
    {
        $userid = auth()->user()->id;
        $posts['user'] = Practice::where('id', $userid)->first();
        return view('Practice.Terms', $posts);
    }

    public function Liabilitys()
    {
        $userid = auth()->user()->id;
        $posts['user'] = Practice::where('id', $userid)->first();
        return view('Practice.Liability', $posts);
    }

    public function chat()
    {
        $userid = auth()->user()->id;
        $posts['user'] = Practice::where('id', $userid)->first();
        return view('Practice.Chat', $posts);
    }

    public function rating()
    {
        $userid = auth()->user()->id;
        $posts['user'] = Practice::where('id', $userid)->first();
        return view('Practice.rating', $posts);
    }



    public function RaiseTicket()
    {
        $userid = auth()->user()->id;
        $user = Practice::where('id', $userid)->first();
        //    $user = Practice::with("AdminResolve")->get();

        $arr = [];

        $arr2 = [];
        $arr3 = [];
        $Raisticket = PracticeRaseTicket::where('practice_id', Auth::id())->where('practice_raise_tickets_status',1)->get()->toArray();
        foreach ($Raisticket as $t) {
            $arr[] = $t;
        }

        $practice_resolve = AdminPracticeResolved::select('id', 'practice_id', 'ticket_id', 'issue', 'issue_date', 'admin_message', 'screenshort', 'practice_resolved_status')->where('practice_id', Auth::id())->get()->toArray();

        foreach ($practice_resolve as $R) {

            $arr2[] = array_values($R);

        }

        foreach ($arr2 as $d) {
            $array_c = ["id", "practice_id", "Ticket_ID", "Issue", "Issue_Date", "message", "screenShort", "practice_raise_tickets_status"];
            $arr3[] = array_combine($array_c, $d);
        }

        foreach ($arr3 as $ac) {
            $arr[] = $ac;
        }
           
        return view('Practice.RaiseTicket', ['user' => $user, 'arr' => $arr]);
    }

    public function PracticeTicketsubmit(Request $request)
    {
        $request->validate([
            'Issue' => 'required',
            'message' => 'required|max:1000',
            // 'file'=>'required'
        ]);

        $userid = auth()->user()->id;
        $ldate = date('Y-m-d');
        $randomNumber = random_int(10000000, 99999999);

        $fileName = [];
        $filePath = [];

        if ($request->file()) {
            $uploadedCount = 0;
            foreach ($request->file('file') as $file) {
                if($uploadedCount < 10){
                    $filename = time() . '_' . $file->getClientOriginalName();
                    $file->move(public_path() . '/Practice/', $filename);
                    $fileName[] = $filename;
                    $uploadedCount++;
                }
            }
        }
        $myString = implode(',', $fileName);


        if ($request->file()) {
            $datas = PracticeRaseTicket::create([
                'practice_id' => $userid,
                'Ticket_ID' => $randomNumber,
                'Issue' => $request->Issue,
                'Issue_Date' => $ldate,
                'message' => $request->message,
                'screenShort' => $myString,
                'practice_raise_tickets_status' => 1,

            ])->save();

            $ticket['email'] = env('MAIL_FROM_ADDRESS');

            $ticket["title"] = $request->Issue;
            $ticket["body"] = $request->message;


            Mail::send("Practice.RaisTicketMail", ["ticket" => $ticket], function ($message) use ($ticket) {
                $message->to($ticket["email"])->subject($ticket["title"]);
            });
            return redirect()->route('ticketGenreated');
        } else {
            $datas = PracticeRaseTicket::create([
                'practice_id' => $userid,
                'Ticket_ID' => $randomNumber,
                'Issue' => $request->Issue,
                'Issue_Date' => $ldate,
                'message' => $request->message,
                'screenShort' => NULL,
                'practice_raise_tickets_status' => 1,

            ])->save();

            $ticket['email'] = env('MAIL_FROM_ADDRESS');

            $ticket["title"] = $request->Issue;
            $ticket["body"] = $request->message;


            Mail::send("Practice.RaisTicketMail", ["ticket" => $ticket], function ($message) use ($ticket) {
                $message->to($ticket["email"])->subject($ticket["title"]);
            });
            return redirect()->route('ticketGenreated');
        }
    }



    public function ticketGenreated()
    {

        $posts['user'] = Practice::where('id', Auth::id())->first();
        // $posts[ 'user' ] = Practice::with("AdminResolve")->get();

        return view('Practice.ticketGenreated', $posts);
    }
    public function FetchRaceTicket(Request $request)
    {

        $data = PracticeRaseTicket::where('practice_id', Auth::id())->orderBy('id', 'ASC')->get();

        return response()->json(['data' => $data]);
    }
    public function profileUpdate(Request $request, $id)
    {
          
        $request->validate([
            'firstName' => 'required',
            'clinicName' => 'required',
            'email' => 'required|Email',
            'phoneNumber' => 'required|numeric',
            'Practice_type' => 'required',
            'language' => 'required',
            'working_Hours' => 'required',
            'clinicName' => 'required',
            'bio' => 'required|min:400|max:2500',
        ]);
       
        $user = Practice::find($id);

        $user->update([
            'firstName' => $request->firstName,
            'email' => $request->email,
            'bio' => $request->bio,
            'clinicName' => $request->clinicName,
            'phoneNumber' => $request->phoneNumber,
        ]);

        $user->practiceDetails()->update([
            'practiceType' => $request->Practice_type,
            'language' => $request->language,
            'workingHours' => $request->working_Hours,
        ]);
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image_path2 = public_path('/Practiceprofile/'.$user->image);
            if(file_exists($image_path2) && !empty($user->image)){
                unlink($image_path2);
            }
            $path = $image->move(public_path('Practiceprofile'), $filename);
            $user->image = $filename;
            $user->save();
        }

        return redirect()->back()->with('message', 'Profile Updated SuccessFully');
    }

    public function passwordchange()
    {
        $user = Auth::user();
        return view('Practice.changePassword', compact('user'));
    }
    public function passowrdUpdate(Request $request)
    {
        $userid = Auth::user()->id;
        $data = Practice::where('id', $userid)->first();
        $chkpass_pass = Hash::check($request->password, $data->password);
        if ($chkpass_pass) {
            $datass = Practice::where('id', $userid)->Update([
                'password' => Hash::make($request->new_password)
            ]);
            if ($datass) {
                return redirect()->back()->with('message', 'Password Change SuccessFully.');
            }
        } else {
            $errors = ['Password Does Not Match.'];
            return redirect()->back()->withErrors($errors);
        }
    }

    public function PracticeSearch(Request $request)
    {
        $user = Auth::user();

        $data = Provider::where('practitioner_Type', $request->providerType)->orWhere('start_Date', $request->startdate)
            ->orWhere('distance_Willing_To_Travel_One_Way', $request->distance)->orWhere('position_Type', $request->position_types)
            ->orWhere('peferred_Daily_Working_Hours', $request->Working_hourss)->orWhere('preferred_Daily_Patient_Volume', $request->patient_val)
            ->orWhere('are_You_Willing_Overnight', $request->travel)
            ->orWhere('zipcode', $request->location)
            ->orderBy('id', 'DESC')->get();

        // $data = Provider::query()
        // ->where('practitioner_Type', 'like', '%'.$request->input('providerType').'%')
        // ->orWhere('start_Date', 'like', '%'.$request->input('startdate').'%')
        // ->orWhere('distance_Willing_To_Travel_One_Way', 'like', '%'.$request->input('distance').'%')
        // ->orWhere('position_Type', 'like', '%'.$request->input('position_types').'%')
        // ->orWhere('peferred_Daily_Working_Hours', 'like', '%'.$request->input('Working_hourss').'%')
        // ->orWhere('preferred_Daily_Patient_Volume', 'like', '%'.$request->input('patient_val').'%')
        // ->orWhere('are_You_Willing_Overnight', 'like', '%'.$request->input('travel').'%')
        // ->orWhere('zipcode', 'like', '%'.$request->input('location').'%')
        // ->orderBy('id', 'DESC')
        // ->get();

        return view('Practice.Search', ['user' => $user, 'data' => $data]);
    }
}