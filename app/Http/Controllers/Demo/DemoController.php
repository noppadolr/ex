<?php

namespace App\Http\Controllers\Demo;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemoController extends Controller
{

    public function about()
    {
        return view('about');
    }
    //End aboute method

    public function contact()
    {
        return view('contact');
    }
    //End contact method
    //
}
