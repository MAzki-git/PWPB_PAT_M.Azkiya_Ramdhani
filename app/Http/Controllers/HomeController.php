<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('layouts.main');
    }

    // public function userhome()
    // {
    //     return view('layouts.mainUser');
    // }
}
