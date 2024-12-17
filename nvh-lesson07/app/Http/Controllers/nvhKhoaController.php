<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class nvhKhoaController extends Controller
{
    public function nvhGetAllKhoa()
    {
        $nvhkhoas = DB::select("select * from khoa");
        return view('nvhkhoa.nvhList',['nvhkhoas' => $nvhkhoas]);
    }

    public function nvhGetKhoa($makh)
    {
        // Truy vấn đọc dữ liệu từ bảng khoa theo điều kiện makh
        $khoa = DB::select('select * from khoa where MaKH =?',[$makh])[0];
        return view('nvhkhoa.nvhDetail',['khoa'=>$khoa]);
    }

    public function nvhEdit($makh)
    {
        $khoa = DB::select('select * from khoa where MaKH =?',[$makh])[0];
        return view('nvhkhoa.nvhEdit',['khoa'=>$khoa]);
    }
    public function nvhEditSubmit($makh, Request $request)
    {
        $makh = $request->input('MaKH');
        $tenkh = $request->input('TenKH');
        DB::update("updare khoa set TenKH = ? where MaKH=?",[$tenkh,$makh]);
        return redirect('/khoa');
    }

    public function nvhInsert()
    {
        return view('/nvhkhoa.nvhInsert');


    }

    public function nvhInsertSubmit(Request $request)
    {
        $validate = $request->validate([
            'MaKH' => 'required|max=2',
            'TenKH' => 'required|max=50', 
        ],
        [
            'MaKH.requierd'=> 'vui long',
            'MaKH.max'=> 'mmm',
            'TenKH.requierd'=> 'vui long',
            'tenKH.max'=> 'mmm',
        ]
        );
        $makh = $request->input('MaKH');
        $makh = $request->input('MaKH');
        DB::insert("insert into khoa(MaKH,TenKH) values (?,?) ",[$makh,$tenkh]);
        return redirect('/khoa');

    }
    public function nvhDelete()
    {
        DB::delete("delete frrom khoa where MaKH=?",[$makh]);
        return redirect('/khoa');
    }


}