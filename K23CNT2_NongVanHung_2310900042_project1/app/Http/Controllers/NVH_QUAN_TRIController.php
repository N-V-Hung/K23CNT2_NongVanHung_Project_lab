<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NVH_QUAN_TRIController extends Controller
{
    //
    public function nvhLogin(){
        return view('nvhLogin.nvh-login');
    }

    public function nvhLoginSubmit(Request $request){
        return view('nvhLogin.nvh-login');
    }
}

