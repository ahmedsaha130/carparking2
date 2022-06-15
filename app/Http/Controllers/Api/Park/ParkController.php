<?php

namespace App\Http\Controllers\Api\Park;

use App\Http\Controllers\Api\Customer\ApiResponses;
use App\Http\Controllers\Controller;
use App\Models\Interval;
use App\Models\Park;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ParkController extends Controller
{
    use ApiResponses;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parks = Reservation::get();
        $msg =['ok'];

        return $this->apiResponse($parks,$msg,200);
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
            'name'          => 'required|unique:parks',
            'number'        => 'required|numeric|unique:parks',
            'status'        => 'required',
        ]);
        if($validator->fails()) {
            return $this->apiResponse('Null',$validator->errors(),401);
        }

        $data['name']           = "PR-".$request->name;
        $data['number']          = $request->number;
        $data['start_time_sensor'] =strtotime($request->start_time_sensor);
        $data['end_time_sensor'] = strtotime($request->end_time_sensor);
        $data['status']         = $request->status;
        $data['note']            = $request->note;


        $park = Park::create($data);

        if ($park){

            $interval_get = Interval::get();


            foreach ($interval_get as $interval ){
                $interval->id;
                $interval = Interval::find($interval->id)->update(['count'=>$interval->count+1]);


            }

            return $this->apiResponse($park,'The Park Save',201);



        }else {
            return $this->apiResponse('Null',"The Park Not Save",400);


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
        $validator = Validator::make($request->all(), [
            'name'          => 'required|unique:parks',
            'number'        => 'required|numeric|unique:parks',
            'status'        => 'required',
        ]);
        if($validator->fails()) {
            return $this->apiResponse('Null',$validator->errors(),401);
        }

        $data['name']           = "PR-".$request->name;
        $data['number']          = $request->number;
        $data['start_time_sensor'] =strtotime($request->start_time_sensor);
        $data['end_time_sensor'] = strtotime($request->end_time_sensor);
        $data['status']         = $request->status;
        $data['note']            = $request->note;


        $park = Park::find($id);

        if (!$park){

            return $this->apiResponse('Null',"The Park is Not Found",400);




        }
        $park->update($request->all());

        if($park){

            return    $this->apiResponse( $park,'The Park is updated',200);

        }else {

            return  $this->apiResponse("Null",'The Park is Not Updated',401);
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
