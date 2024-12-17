<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\NvhNhacCC;

class NvhNhaCCController extends Controller
{
    //
    public function list()
    {
        $nvhNhaCCs = NvhNhaCC::all();
        return view('NvhNhaCC.list',['nvhNhaCCs'=>$nvhNhaCCs]);
    }
}
