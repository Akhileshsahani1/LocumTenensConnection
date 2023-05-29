<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Provider;
use Auth;
use Hash;
use Session;

class ProviderChatController extends Controller
{
    //
    public function providerChat(){
        //dd('fgfg');
        $userid =Auth::id();
        $posts[ 'user' ] = Provider::where( 'id', $userid )->first();
        return view('Provider.chat', $posts);
        
    }

      
}
