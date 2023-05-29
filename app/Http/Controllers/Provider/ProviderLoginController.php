<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider;
use App\Models\providerRaiseTicket;
use App\Models\ProviderAvialability;
use App\Models\Practice;
use App\Models\PracticeDetail;
use App\Models\AdminProviderTicketResolved;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Models\User;
use validator;
use Auth;
use Hash;
use Session;

class ProviderLoginController extends Controller {
    //

    public function showform() {
        return view('Provider.login' );
    }

    public function checklogin( Request $request ) {
        //dd( $request );
        $this->validate( $request, [
            'email' => 'required | email',
            'password' => 'required|min:5 | max:12',
        ] );

        // $provider = Provider::where( 'email', '=', $request->email )->first();
        $auth = Auth::guard( 'provider' )->attempt( [ 'email' => $request->email, 'password' => $request->password ] );

        $token = md5( uniqid() );

        $data = User::where( 'email', $request->email )->update( [ 'token' => $token ] );
        if ( $auth ) {
            $remember_me = $request->has('remember') ? true : false; 
            if($remember_me){
                Cookie::queue('emailM',$request->email,1440);
                Cookie::queue('passwordM',$request->password,1440);
  
            }else{
                Cookie::queue('emailM',$request->email,-1);
                Cookie::queue('passwordM',$request->password,-1);
            }
            return redirect()->route( 'provider.dashboard' );
        } else {
            return back()->with( 'fail', 'Email or password not matches' );
        }
    }

    public function changePassword() {
        $userid = Auth::id();
        $posts[ 'user' ] = Provider::where( 'id', $userid )->first();
        return view( 'Provider.changePassword', $posts );
    }

    public function changePasswordUpdate( Request $req ) {
        $req->validate( [
            'old_password' => 'required | min:6 |max:25',
            'new_password' => 'required | min:6 |max:25',
            'confirm_password' => 'required |same:new_password',
        ] );

        $current_user = Auth::id();
        $user = Provider::where( 'id', $current_user )->first();
        #Match The Old Password
        if ( !Hash::check( $req->old_password, $user->password ) ) {
            return back()->with( 'error', "Old Password Doesn't match!" );
        }
        #new Password update
        $password_update = Hash::make( $req->new_password );
        $update_data = Provider::where( 'id', $current_user )->update( [
            'password' => $password_update,
        ] );
        if ( $update_data ) {
            return redirect()->back()->with( 'success', 'Your password updated successfully' );
        }
    }

    public function showdashboard() {
        $userid = Auth::id();
        $user = Provider::where( 'id', $userid )->first();
        $Practice =  DB::table('practices')->join('practice_details','practice_details.practice_id','=','practices.id')
        ->get();
        return view( 'Provider.dashboard', [ 'user' => $user, 'Practice' => $Practice ] );
    }

    public function logout() {
        $data = Auth::user();
        if ( $data ) {
            Auth::logout();
            return redirect()->route( 'provider.login' );
        }
    }
    /*Raise Ticket */

    public function providerRaiseTicket() {

        $userid = Auth::id();
        $user = Provider::where( 'id', $userid )->first();
        $arr = [];
        $providerRaiseTicket = providerRaiseTicket::where( 'provider_id', $userid)->where('ticketStatus', 1)->get()->toArray();
      
        foreach($providerRaiseTicket as $t)
        {
          $arr[]  = $t;
        }


        // $AdminProviderTicketResolved = AdminProviderTicketResolved::select( 'admin_provider_ticket_resolveds.*' )->get();
        $arr2 = [];
        $arr3 = [];
        $AdminProviderTicketResolved = AdminProviderTicketResolved::where('provider_id', Auth::id())->get()->toArray();
        // dd($AdminProviderTicketResolved);
        foreach($AdminProviderTicketResolved as $R)
        {
          $arr2[]  = array_values($R);
        }
        foreach($arr2 as $d)
        {
            $key = ["id","provider_id","ticketId","ticketTitle","ticketDescription","attachFile","ticketStatus","created_at","updated_at"];
            $arr3[]  = array_combine($key,$d);
        }
       
        foreach($arr3 as $ac)
        {
            $arr[]  = $ac;
        }
       
        return view('Provider.raiseTicket',['user' => $user, 'arr' => $arr] );
    }

    public function raiseTicket( Request $request ) {
          
        $request->validate( [
            'ticketTitle' => 'required',
            'ticketDescription' => 'required:max:1000',
            //  'file' => 'required',
        ] );

        $userid = Auth::id();
        //$current = Provider::where( 'id', $userid )->first();
        if ( $request->file( 'file' ) ) {
            $fileNames = [];
            $uploadedCount = 0;
            foreach ( $request->file( 'file' ) as $attachfile ) {
                if($uploadedCount < 10){
                    $attachfileName = $attachfile->getClientOriginalName();
                    $attachfile->move( public_path() . '/provider/uploads/attachFile', $attachfileName );
                    $fileNames[] = $attachfileName;
                $uploadedCount++;
                }
             
            }
            //$attachfiles = json_encode( $fileNames );
            $attachfiles = implode( ',', $fileNames );
        }

        $user = new providerRaiseTicket();
        $user->ticketId = rand();
        $user->provider_id = $userid;
        $user->ticketTitle = $request->ticketTitle;

        if ( $request->file( 'file' ) ) {
            $user->attachFile = $attachfiles;
        }
        $user->ticketDescription = $request->ticketDescription;

        $user->ticketStatus = true;
        $result = $user->save();
        return redirect()->route( 'provider.ticketGenerate' );
    }

    public function TicketGenerate() {
        $userid = Auth::id();
        $posts[ 'user' ] = Provider::where( 'id', $userid )->first();
        return view( 'Provider.ticketGenerate', $posts );
    }
    //availability set up dashboard

    public function availability() {
        $userid = Auth::id();

        $posts = Provider::where( 'id', $userid )->first();
        $data = ProviderAvialability::where( 'userid', $userid )->get();

        return view( 'Provider.availibility', [ 'data' => $data, 'user' => $posts ] );
        //return view( 'Provider.availability' );
    }

    public function calendarEvents( Request $request ) {
        $bookingid = rand();
        $userid = Auth::id();
        switch ( $request->type ) {
            case 'create':
            $data1 = ProviderAvialability::where( 'event_start', '=', $request->event_start )
            ->where( 'event_end', '=', $request->event_end )
            ->where( 'status', '=', 1 )
            ->first();
            if ( $data1 == 1 ) {
                $data1->delete();
            }

            $event = ProviderAvialability::create( [
                'event_name' => 'available',
                'event_start' => $request->event_start,
                'event_end' => $request->event_end,
                'bookingid' => $bookingid,
                'color' => '#3788d8',
                'status' => '1',
                'userid' => $userid
            ] );

            $data = ProviderAvialability::where( 'event_start', '=', $request->event_start )
            ->where( 'event_end', '=', $request->event_end )
            ->where( 'status', '=', 2 )
            ->first();
            if ( $data ) {
                $data->delete();
            }
            return response()->json( $event );
            break;
            case 'createfalse':
            $data2 = ProviderAvialability::where( 'event_start', '=', $request->event_start )
            ->where( 'event_end', '=', $request->event_end )
            ->where( 'status', '=', 2 )
            ->first();
            if ( $data2 == 1 ) {
                $data2->delete();
            }
            $event = ProviderAvialability::create( [
                'event_name' => 'busy',
                'event_start' => $request->event_start,
                'event_end' => $request->event_end,
                'bookingid' => $request->bookingid,
                'color' => '#fa0000',
                'status' => '2',
                'userid' => $userid
            ] );
            $data = ProviderAvialability::where( 'event_start', '=', $request->event_start )
            ->where( 'event_end', '=', $request->event_end )
            ->where( 'status', '=', 1 )
            ->first();
            if ( $data ) {
                $data->delete();
            }

            return response()->json( $event );
            break;

            case 'creates':

            $data2 = ProviderAvialability::where( 'event_start', '=', $request->event_start )
            ->where( 'event_end', '=', $request->event_end )
            ->where( 'status', '=', 2 )
            ->first();
            if ( $data2 == 1 ) {
                $data2->delete();
            }
            $event = ProviderAvialability::create( [
                'event_name' => 'busy',
                'event_start' => $request->event_start,
                'event_end' => $request->event_end,
                'bookingid' => $request->bookingid,
                'color' => '#fa0000',
                'status' => '2',
                'userid' => $userid
            ] );
            $data = ProviderAvialability::where( 'event_start', '=', $request->event_start )
            ->where( 'event_end', '=', $request->event_end )
            ->where( 'status', '=', 1 )
            ->first();
            if ( $data ) {
                $data->delete();
            }

            return response()->json( $event );
            break;

            case 'createweek':

            $data1 = ProviderAvialability::where( 'event_start', '=', $request->event_start )
            ->where( 'event_end', '=', $request->event_end )
            ->where( 'status', '=', 1 )
            ->first();
            if ( $data1 == 1 ) {
                $data1->delete();
            }

            $event = ProviderAvialability::create( [
                'event_name' => 'available',
                'event_start' => $request->event_start,
                'event_end' => $request->event_end,
                'bookingid' => $request->bookingid,
                'color' => '#3788d8',
                'status' => '1',
                'userid' => $userid
            ] );

            $data = ProviderAvialability::where( 'event_start', '=', $request->event_start )
            ->where( 'event_end', '=', $request->event_end )
            ->where( 'status', '=', 2 )
            ->first();
            if ( $data ) {
                $data->delete();
            }

            return response()->json( $event );
            break;

            case 'delete':

            $bid = ProviderAvialability::find( $request->id );
            $bookid = $bid->bookingid;
            //$event = ProviderAvialability::find( $bookid )->delete();
            $event = ProviderAvialability::where( 'bookingid', $bookid )->delete();
            return response()->json( $event );
            break;

            default:
            # ...
            break;
        }
    }

    public function disablecalander( Request $request ) {
        $postss = ProviderAvialability::where( 'userid', $request->uid )->get();
        for (
            $i = 0; $i <= count( $postss ) - 1;
            $i++
        ) {
            $postss[ $i ]->status = '0';
            $postss[ $i ]->save();
        }
        $userid = Auth::id();
        $posts = Provider::where( 'id', $userid )->first();
        $data = ProviderAvialability::where( 'userid', $userid )->get();
        //return view( 'Provider.availibility', [ 'data'=>$data, 'user'=>$posts ] );
        return redirect()->route( 'provider.availability', [ 'data' => $data, 'user' => $posts ] );
    }

    public function ablecalander( Request $request ) {
        $postss = ProviderAvialability::where( 'userid', $request->uid )->get();
        for (
            $i = 0; $i <= count( $postss ) - 1;
            $i++
        ) {

            if ( $postss[ $i ]->event_name == 'available' ) {
                $postss[ $i ]->status = '1';
                $postss[ $i ]->save();
            } else {
                $postss[ $i ]->status = '2';
                $postss[ $i ]->save();
            }
        }
        $userid = Auth::id();
        $posts = Provider::where( 'id', $userid )->first();
        $data = ProviderAvialability::where( 'userid', $userid )->get();
        //return view( 'Provider.availibility', [ 'data'=>$data, 'user'=>$posts ] );
        return redirect()->route( 'provider.availability', [ 'data' => $data, 'user' => $posts ] );
    }
}
