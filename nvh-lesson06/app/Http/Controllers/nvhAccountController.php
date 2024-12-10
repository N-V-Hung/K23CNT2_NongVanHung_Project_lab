<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class nvhAccountController extends Controller
{
    public function nvhaccount()
    {
        return view('nvh-login');
    }
    //form login - post (khi đăng nhập)
    /*kiểm tra email,mật khẩu không để cống
    nếu email=nvh@gmail.com và pass=123456a@ thì lưu thong tin vào sêssion
    */


    public function  nvhloginSubmit()
    {
         //validation
        $validation = $request->validate([
            'nvhEmail' => 'required|email',
            'nvhPass' => 'required|min:6'
        ]);
    

    //check login -> store session ->redirect home
        $nvhEmail = $request->input('nvhEmail');
        $nvhPass = $request->input('nvhPass');


        $nvhLoginSession = [
            'nvhEmail' =>  $nvhEmail,
            'nvhPass' => $nvhPass
        ];

        $nvh_json= json_encode($nvhLoginSession);


        if($nvhEmail == "nvh@gmail.com" && $nvhPass == "123456a@")
        {
            $request->session()->put('K23CNT2-NongVanHung',$nvhEmail);
            return redirect('/');
        }
        return redirect()->back->with('nvh-error','Lỗi đăng nhập');
    }
  
   

    public function nvhlogout(Request $request)
    {
        $request->session()->forget('K23CNT-NongVanHung');
        $request->session()->flush();
        return redirect('/');
    }
    

}