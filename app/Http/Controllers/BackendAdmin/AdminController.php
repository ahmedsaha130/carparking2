<?php

namespace App\Http\Controllers\BackendAdmin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Park;
use App\Models\Reservation;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct (){
        if (!Auth::check()){

            return redirect()->route('admin.show_login_form');
        }
    }
    public  function index(){

        if (Auth::check()) {

            $customers = Customer::withTrashed()->orderBy('id','Desc')->take(4)->get();
            $parks = Park::orderBy('id','Desc')->take(4)->get();
            $reservations = Reservation::withTrashed()->with(['customers','intervals','parks'])->orderBy('id','Desc')->take(5)->get();
            $reservations_all = Reservation::withTrashed()->get();
            $busy_count = Reservation::where('status',2)->get();
            $reservation_count = Reservation::where('status',1)->get();
            $cancel_count = Reservation::where('status',0)->onlyTrashed()->get();
            $complement_count = Reservation::where('status',3)->onlyTrashed()->get();
            return view('Admin.index',compact('busy_count','reservation_count'
                ,'cancel_count','complement_count','reservations','reservations_all','customers','parks'));
        }


        return redirect()->route('admin.show_login_form');

    }
}
