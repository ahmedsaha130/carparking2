<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class CustomerAuth extends Controller
{

    public function __construct (){
        if (!Auth::check()){

            return redirect()->route('customer.show_login_form');
        }
    }
    public  function index(){

        if (Auth::check()) {
            return view('frontend.index');
        }
        return redirect()->route('customer.show_login_form');

    }
//    public function index()
//    {
//        return view('frontend.index');
//    }
//    public function login()
//    {
//        return view('frontend.login');
//    }
//    public function check_login( Request  $request)
//    {
//        $this->validate($request,[
//           'email'=>'required|email',
//           'password'=>'required|min:5',
//        ]);
//        if (Auth::guard('customer')->attempt(['email'=>$request->email,'password'=>$request->password])){
//
//            return redirect()->route('site_user');
//        }
//
//        return redirect()->back()->with([
//            'message' => 'خطأ في الأيميل أو كلمة السر',
//            'alert-type' => 'danger',
//        ]);
//    }
}
