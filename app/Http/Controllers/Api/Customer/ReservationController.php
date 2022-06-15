<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;

use App\Http\Resources\CustomCustomerResource;
use App\Models\Customer;
use App\Models\Interval;
use App\Models\Park;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class ReservationController extends Controller
{
    use ApiResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::get();
        $msg =['ok'];

        return $this->apiResponse($reservations,$msg,200);
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

        $validator = Validator::make($request->all(), [
            'interval_id' => 'required',
            'customer_id' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->apiResponse('Null',$validator->errors(),401);
        }


        $park_id = Park::first()->id;

        $reservation_check = Reservation::where('interval_id', '=', $request->interval_id)->where('park_id', '=', $park_id)->exists();
        if (!$reservation_check) {
            $data['status'] = 1;
            $data['customer_id'] = $request->customer_id;
            $interval = Interval::find($request->interval_id);
            $interval_count = ($interval->count) - 1;
            $interval->update(['count' => $interval_count]);
            $data['interval_id'] = $request->interval_id;
            $data['park_id'] = $park_id;
            $data['number'] = Carbon::now()->timestamp;


            $reservation = Reservation::create($data);


        } else {

            $data['status'] = 1;
            $data['customer_id'] = $request->customer_id;


            $array = [];
            $res = Reservation::where('interval_id', '=', $request->interval_id)->get();
            foreach ($res as $re) {
                array_push($array, $re->park_id);
            }

            $park_new_id = Park::whereNotIn('id', $array)->first();
            if ($park_new_id) {

                $data['status'] = 1;
                $data['customer_id'] = $request->customer_id;
                $interval = Interval::find($request->interval_id);
                $interval_count = ($interval->count) - 1;
                $interval->update(['count' => $interval_count]);
                $data['interval_id'] = $request->interval_id;
                $reservationRecord = Reservation::latest()->first();
                if ($reservationRecord != null) {
                    $data['number'] = ($reservationRecord->id) + 1. . date('ymd');

                } else {

                    $data['number'] = 1. . date('ymd');

                }
                $data['park_id'] = $park_new_id->id;
                $data['number'] = Carbon::now()->timestamp;


                $reservation = Reservation::create($data);


            }
        }


        if ($reservation) {


            return $this->apiResponse($reservation,'The Reservation Save',201);


        }else {

            return $this->apiResponse('Null',"The Reservation Not Save",400);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reservation = Reservation::where('customer_id',$id)->with(['intervals','parks'])->withTrashed()->get();
        $msg = ["ok"];

        if($reservation){

            return $this->apiResponse( $reservation,$msg,200);


        }else{
            return $this->apiResponse('Null',"The Data Not Found",401);


        }    }

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



        $validator = Validator::make($request->all(), [
            'interval_id' => 'required',
            'customer_id' => 'required',
        ]);
        if ($validator->fails()) {

            return $this->apiResponse('Null',$validator->errors(),401);
        }

        $reservation = Reservation::whereId($id)->first();


        $park_id = Park::first()->id;

        $reservation_check = Reservation::where('interval_id', '=', $request->interval_id)->where('park_id', '=', $park_id)->exists();
        if (!$reservation_check) {
            $data['status'] = 1;
            $data['customer_id'] = $request->customer_id;
            $data['park_id'] = $park_id;

            //update current time



            $reservation_current = Reservation::whereId($id)->first();

            if ($request->interval_id == $reservation_current->interval_id ) {

                $data['interval_id'] = $request->interval_id ;
            }else
            {
                $current_interval = Interval::whereId($reservation_current->interval_id)->first();
                $current_interval_count = ($current_interval->count) +1 ;
                $current_interval->update(['count'=>$current_interval_count]);

                if($current_interval)
                {
                    $new_interval = Interval::whereId($request->interval_id)->first();
                    $new_interval_count = ($new_interval->count) -1 ;
                    $new_interval->update(['count'=>$new_interval_count]);
                    $data['interval_id'] = $request->interval_id ;

                }

            }






            $reservation->update($data);


        } else {
            $data['status'] = 1;
            $data['customer_id'] = $request->customer_id;


            $array = [];
            $res = Reservation::where('interval_id', '=', $request->interval_id)->get();
            foreach ($res as $re) {
                array_push($array, $re->park_id);
            }

            $park_new_id = Park::whereNotIn('id', $array)->first();
            if ($park_new_id) {
                $data['status'] = 1;
                $data['customer_id'] = $request->customer_id;


                //update current time
                $reservation_current = Reservation::whereId($id)->first();

                if ($request->interval_id == $reservation_current->interval_id ) {

                    $data['interval_id'] = $request->interval_id ;
                }else
                {
                    $current_interval = Interval::whereId($reservation_current->interval_id)->first();
                    $current_interval_count = ($current_interval->count) +1 ;
                    $current_interval->update(['count'=>$current_interval_count]);

                    if($current_interval)
                    {
                        $new_interval = Interval::whereId($request->interval_id)->first();
                        $new_interval_count = ($new_interval->count) -1 ;
                        $new_interval->update(['count'=>$new_interval_count]);
                        $data['interval_id'] = $request->interval_id ;

                    }
                }





                $data['park_id'] = $park_new_id->id;


                $reservation->update($data);


            }
        }


        if ($reservation) {

            return    $this->apiResponse( $reservation,'The Reservation is updated',200);



        }else {

            return  $this->apiResponse("Null",'The Reservation is Not Updated',401);

        }


    }


    public function update_status(Request $request,$id)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required',

        ]);

        if ($validator->fails()) {

            return $this->apiResponse('Null',$validator->errors(),401);
        }
        $reservation = Reservation::whereId($id)->first();
        if ($reservation) {


            if ($request->status == 0 || $request->status == 3) {

                $data['status'] = $request->status;
                $reservation->update($data);
                $interval_id = Reservation::find($id)->first();
                $current_interval = Interval::find($interval_id->interval_id);
                $current_interval_count = ($current_interval->count) + 1;
                $current_interval->update(['count' => $current_interval_count]);

                $reservation->delete();


            } else {
                $data['status'] = $request->status;

            }


            $reservation->update($data);

            if ($reservation) {

                return    $this->apiResponse( $reservation,'The Status is updated',200);



            }else {

                return  $this->apiResponse("Null",'The Status is Not Updated',401);

            }

        }
    }

    public function show_current_busy_reservation($id){


        $customer = Customer::find($id);
        if ($customer){

            $reservations = Reservation::where('customer_id',$id)->Where('status',1)->orWhere('status',2)->with(['intervals','parks'])->get();



        if ($reservations) {

            return $this->apiResponse($reservations, 'The current_busy_reservation is Found', 200);

        }else {

            return  $this->apiResponse("Null",'The current_busy_reservation is Not Found',401);

        }

        }else {

            return  $this->apiResponse("Null",'The current_busy_reservation is Not Found',401);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
