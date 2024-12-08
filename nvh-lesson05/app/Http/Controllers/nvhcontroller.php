<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class nvhcontroller extends Controller
{
    public function nvhindex()
    {
        return view('nvh-login');
    }
    public function nvhSubmit(Request $request)
    {
        $validationData = $request->validate
        ([
            'email' =>'required|email',
            'password'=>'required|min:6|max:12'
        ]);
        $email=$request->input('email');
        $password=$request->input('password');

        //return 'xin chào ','$email';
        //return "Email:" . $email . "Password:".$password;
        //return $request();
    }

    public function nvhshowForm()
    {
        return view('nvh-register');
    }

    
    public function nvhsubmitForm(Request $request1)
    {

        $validatedData = $request1->validate([
            'userid' => 'required|string|min:5|max:12',
            'password' => 'required|string|min:7|max:12',
            'name' => 'required|alpha',
            'country' => 'required',
            'zipcode' => 'required|numeric',
            'email' => 'required|email',
            'sex' => 'required',
            'language' => 'required|array|min:1',
        ]);

        
        //return view('register_success', ['data' => $validatedData]);
    }

   


    public function nvhshowForm2()
    {
        return view('nvh-register2');
    }

    public function nvhsubmitForm2(Request $request2)
    {
        $validatedData = $request2->validate([
            'name' => 'required|string|max:50',
            'email' => 'required|email',
            'dob' => 'required|date',
            'gender' => 'required',
            'mobile' => 'required|digits:10',
            'city' => 'required',
            'expertise' => 'required|array|min:1',
            'group' => 'required|array|min:1',
            'address' => 'required|string|max:255',
            'country' => 'required|string|max:50',
        ]);

        
        //return redirect()->route('register.form')->with('success', 'You have successfully validated the form');
    }
    public function nvhcreate()
    {
        
        return view('nvh-create'); 
    }


    public function nvhstore(Request $request3)
    {
        $validated = $request3->validate([
            'arrival_date' => 'required|date|after:today',
            'nights' => 'required|integer|min:1',
            'adults' => 'required|integer|min:1',
            'children' => 'nullable|integer|min:0',
            'room_type' => 'required|in:Standard,Business,Suite',
            'bed_type' => 'required|in:King,Double Double',
            'smoking' => 'boolean',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|regex:/^[0-9]{10,15}$/',
        ]);

       
    }

}


