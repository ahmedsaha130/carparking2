<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use App\Models\Park;
use App\Models\Reservation;
use Livewire\Component;

class Chat extends Component
{
    public $messageText;

    public function render()
    {
//        $messages = \App\Models\Chat::with('user')->latest()->take(10)->get()->sortBy('id');

//        return view('livewire.index', compact('messages'));
        $customers = Customer::withTrashed()->orderBy('id','Desc')->take(4)->get();
        $parks = Park::orderBy('id','Desc')->take(4)->get();
        $reservations = Reservation::withTrashed()->with(['customers','intervals','parks'])->orderBy('id','Desc')->take(5)->get();
        $reservations_all = Reservation::withTrashed()->get();
        $busy_count = Reservation::where('status',2)->get();
        $reservation_count = Reservation::where('status',1)->get();
        $cancel_count = Reservation::where('status',0)->onlyTrashed()->get();
        $complement_count = Reservation::where('status',3)->onlyTrashed()->get();
        return view('livewire.chat',compact('busy_count','reservation_count'
            ,'cancel_count','complement_count','reservations','reservations_all','customers','parks'));
    }

    public function sendMessage()
    {
        \App\Models\Chat::create([
            'user_id' => auth()->user()->id,
            'message_text' => $this->messageText,
        ]);

        $this->reset('messageText');
    }

    public function index()
    {
        $customers = Customer::latest()->take(10)->get()->sortBy('id');

        return view('livewire.index', compact('customers'));
    }


}
