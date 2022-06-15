<?php

namespace App\Http\Controllers\BackendAdmin;
use App\Http\Controllers\Controller;

use App\Models\Customer;
use App\Models\Interval;
use App\Models\park;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ParkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){

        $this->middleware('auth');
    }

    public function index()
    {
        $parks = Park::all();

        return view('parking.index',compact('parks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parking.create');
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
            return redirect()->back()->withErrors($validator)->withInput();
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



            session()->flash('add', 'park Created successfully');

            return redirect()->route('park.index')->with([
                'message' => 'park Created successfully',
                'alert-type' => 'success',
            ]);
        }
        session()->flash('error', 'Something was wrong');

        return redirect()->back()->with([
            'message' => 'Something was wrong',
            'alert-type' => 'danger',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Park  $park
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $park = Park::find($id)->first();
        $reservations = Reservation::where('park_id',$id)->with(['intervals','parks','customers'])->withTrashed()->get();
        return  view('parking.show',compact('park','reservations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Park  $park
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $park = Park::find($id);

        return view('parking.edit',compact('park'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Park  $park
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'name'          => 'required|unique:parks,name,'.$id,
            'number'        => 'required|numeric|unique:parks,number,'.$id,
            'status'        => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $park = park::whereId($id)->first();

        if ($park) {
            $data['name']           = "PR-".$request->name;
            $data['number']          = $request->number;
            $data['start_time_sensor'] =strtotime($request->start_time_sensor);
            $data['end_time_sensor'] = strtotime($request->end_time_sensor);
            $data['note']            = $request->note;

//            if ($request->status == 0){
//
//                $interval_get = Interval::get();
//
//
//                foreach ($interval_get as $interval ){
//                    $interval->id;
//                    $interval = Interval::find($interval->id)->update(['count'=>$interval->count-1]);
//
//
//                }
//                $data['status'] = $request->status;
//
//
//
//            }else{
//                $interval_get = Interval::get();
//
//
//                foreach ($interval_get as $interval ){
//                    $interval->id;
//                    $interval = Interval::find($interval->id)->update(['count'=>$interval->count+1]);
//
//
//                }
//
//                $data['status'] = $request->status;
//
//
//
//            }
            $data['status'] = $request->status;



            $park->update($data);

            if ($park) {


                session()->flash('edit', 'park Updated successfully');

                return redirect()->route('park.index')->with([
                    'message' => 'park Updated successfully',
                    'alert-type' => 'success',
                ]);
            }
            session()->flash('error', 'park  Not Updated !!');

            return redirect()->back()->with([
                'message' => 'Something was wrong',
                'alert-type' => 'danger',
            ]);
        }
    }
    public function park_status(Request $request)
    {
        $id = $request->id_park;
        $park = Park::find($id)->first();
        if ($park) {

            $data['status'] = $request->status_park;


            $park->update($data);
            session()->flash('edit', 'Status Updated successfully');

            return redirect()->route('park.index')->with([
                'message' => 'Status Updated successfully',
                'alert-type' => 'success',
            ]);
        }
        session()->flash('error', 'Something was wrong');

        return redirect()->back()->with([
            'message' => 'Something was wrong',
            'alert-type' => 'danger',
        ]);
    }
    public function active_park(){

        $parks = Park::where('status','1')->orderby('created_at','desc')->get();
        return view('parking.active.index',compact('parks'));
    } public function disactive_park(){

    $parks = Park::where('status','0')->orderby('created_at','desc')->get();
    return view('parking.dis_active.index',compact('parks'));
}


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Park  $park
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request  $request)
    {

        $id = $request->id_park;
        $park = Park::whereId($id)->first();

        if ($park) {

            $park->delete();

            if ($park) {


                $interval_get = Interval::get();


                foreach ($interval_get as $interval ){
                    $interval->id;

                    $interval = Interval::find($interval->id)->update(['count'=>$interval->count-1]);


                }
                session()->flash('delete', 'park Deleted successfully');

                return redirect()->route('park.index')->with([
                    'message' => 'park Deleted successfully',
                    'alert-type' => 'success',
                ]);
            }
            session()->flash('error', 'park Not Deleted');

            return redirect()->back()->with([
                'message' => 'Something was wrong',
                'alert-type' => 'danger',
            ]);
        }
    }
}
