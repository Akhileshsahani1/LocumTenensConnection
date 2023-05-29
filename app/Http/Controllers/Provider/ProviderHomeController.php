<?php

namespace App\Http\Controllers\Provider;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProviderHomeController extends Controller
{
    //

    public function home()
    {
        //dd('You are active');
        return view('Provider.index');
    }

}
