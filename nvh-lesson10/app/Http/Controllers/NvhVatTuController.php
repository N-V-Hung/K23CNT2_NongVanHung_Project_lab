<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\NvhVatTu;

class NvhNhaCCController extends Controller
{
    //
    public function list()
    {
        $nvhVatTus = NvhVatTu::all();
        return view('NvhVatTu.list',['nvhVatTus'=>$nvhVatTus]);
    }
}
