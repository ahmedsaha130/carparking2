<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function  chat(){

        return view('livewire.index');
    }
    public function index()
    {
        $customers = Customer::latest()->take(10)->get()->sortBy('id');

        return view('livewire.index', compact('customers'));
    }

}
