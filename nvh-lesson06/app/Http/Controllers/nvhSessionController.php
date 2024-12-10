<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class nvhSessionController extends Controller
{
    //Đọc dữ liệu từ session
    public function nvhGetSessionData(Request $request)
    {
        if($request->session()->has('K23CNT-NongVanHung'))
        {
            echo $request->session()->get('K23CNT-NongVanHung');

        }
        else 
        {
            echo "<h2>Không có dữ liệu trong sessoin </h2>";
        }
    }

        //Gh dữ liệu vào session
    public function nvhStoreSessionData(Request $request)
    {
        $request->session()->put('K23CNT2-NongVanHung','K23CNT2 - Nông Văn Hưng - 230900042');
        echo "<h2>Dữ liệu đã được lưu vào session</h2>";
    }

    //Xóa dữ liệu trong session
    public function nvhDeleteSessionData(Request $request)
    {
        $request->session()->forget('K23CNT-NongVanHung');
        echo "<h2> Dữ liệu đã được xóa khỏi session </h2>";
    }
    

}

