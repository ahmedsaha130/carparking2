<?php

namespace App\Http\Controllers\BackendAdmin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Interval;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ArchiveReservations extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::onlyTrashed()->with(['customers', 'parks', 'intervals'])->get();
        $intervals = Interval::where('status', 1)->where('count', '>=', '1')->get();
        $customers = Customer::where('status', 1)->get();

        return view('reservation.archives.index',compact('reservations','customers','intervals'));
    }

    public function cancel(){

        $reservations = Reservation::onlyTrashed()->where('status',0)->with(['customers', 'parks', 'intervals'])->get();


        return view('reservation.cancel.index',compact('reservations'));

    } public function finish (){
    $reservations = Reservation::onlyTrashed()->where('status',3)->with(['customers', 'parks', 'intervals'])->get();

    return view('reservation.finish.index',compact('reservations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request)
    {
        $reservation = Reservation::withTrashed()->where('id',$request->id_reservation)->first();



            if ($reservation) {

                $reservation->forceDelete();

                session()->flash('delete', 'Reservation Deleted successfully');

                return redirect()->route('reservation_archive.index')->with([
                    'message' => 'reservation Deleted successfully',
                    'alert-type' => 'success',
                ]);
            }
            session()->flash('error', 'reservation Not Deleted');

            return redirect()->back()->with([
                'message' => 'Something was wrong',
                'alert-type' => 'danger',
            ]);
        }


}
