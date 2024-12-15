<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\nvhSinhVien;


class nvhController extends Controller
{
    //
    public function nvhList()
    {
        $nvhSinhvien = NvhSinhVien::all();
        return view('nvhSinhVien.nvh-list',['nvhsinhvien'=>$nvhSinhvien]);
    }
    
    public function nvhCreate()
    {
        return view('nvhSinhVien.nvh-create');
    }
    public function nvhCreateSubmit(Request $request)
    {
        //lay du lieu 
        $nvhSinhViens = new NvhSinhvien();
        $nvhSinhViens->NVHMASV =$request->NVHMASV;
        $nvhSinhViens->NVHHOSV =$request->NVHHOSV;
        $nvhSinhViens->NVHTENSV =$request->NVHTENSV;
        $nvhSinhViens->NVHPHAI =$request->NVHPHAI;
        $nvhSinhViens->NVHNGAYSINH =$request->NVHNGAYSINH;
        $nvhSinhViens->NVHNOISINH =$request->NVHNOISINH;
        $nvhSinhViens->NVHMAKH =$request->NVHMAKH;
        
        $nvhSinhViens->save();
        return back()->with('nvhSinhVien-created','da them mot sinh vien thanh cong');
    }
}
