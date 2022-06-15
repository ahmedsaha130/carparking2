<?php

namespace App\Http\Controllers\BackendAdmin;

use App\Http\Controllers\Controller;
use App\Models\Interval;
use App\Models\Park;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IntervalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $intervals = Interval::get();

       return view('interval.index',compact('intervals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parks = Park::get();
      $count_parks =   count($parks);
        return view('interval.create',compact('count_parks'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $i =0;
//        $validator = Validator::make($request->all(), [
//        'start[$i]'          => 'required|unique:intervals',
//        'end[$i]'        => 'required|numeric|unique:intervals',
//        'status[$i]'        => 'required',
//        'count'        => 'required',
//    ]);
//       $i++;
//        if($validator->fails()) {
//            return redirect()->back()->withErrors($validator)->withInput();
//        }

        $intervals_list = [];
        for ($i=0; $i <count($request->start) ; $i++) {


            $intervals_list [$i]['start'] = $request->start[$i];
            $intervals_list [$i]['end'] = $request->end[$i];
            $intervals_list [$i]['status'] = $request->status[$i];
            $intervals_list [$i]['count'] = $request->count[$i];


        }
        $interval = Interval::insert($intervals_list);

        if ($interval) {


            session()->flash('edit', 'interval Save successfully');

            return redirect()->route('interval.index')->with([
                'message' => 'interval Updated successfully',
                'alert-type' => 'success',
            ]);
        }
        session()->flash('error', 'interval  Not Updated !!');

        return redirect()->back()->with([
            'message' => 'Something was wrong',
            'alert-type' => 'danger',
        ]);
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
    }  public function active_interval()
    {
        $intervals = Interval::where('status',1)->get();

        return view('interval.active.index',compact('intervals'));
    }  public function dis_active_interval()
    {
        $intervals = Interval::where('status',0)->get();

        return view('interval.dis_active.index',compact('intervals'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $interval =Interval::find($id);
        $parks = Park::get();
        $count_parks =   count($parks);
       return view('interval.edit',compact('interval','count_parks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
        {


        $validator = Validator::make($request->all(), [
            'start'          => 'required|unique:intervals,start,'.$id,
            'end'        => 'required|numeric|unique:intervals,end,'.$id,
            'status'        => 'required',
            'count'        => 'required',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

            $interval = Interval::whereId($id)->first();

        if ($interval) {
            $data['start']           = $request->start;
            $data['end']          = $request->end;
            $data['status'] =$request->status;
            $data['count'] = $request->count;




            $interval->update($data);

            if ($interval) {


                session()->flash('edit', 'interval Updated successfully');

                return redirect()->route('interval.index')->with([
                    'message' => 'interval Updated successfully',
                    'alert-type' => 'success',
                ]);
            }
            session()->flash('error', 'interval  Not Updated !!');

            return redirect()->back()->with([
                'message' => 'Something was wrong',
                'alert-type' => 'danger',
            ]);
        }
    }

    public  function interval_status(Request  $request){

        $id = $request->id_interval;
        $interval = Interval::whereId($id)->first();
        if ($interval){

            $data['status']       = $request->status;


            $interval->update($data);
            session()->flash('edit', 'Status Updated successfully');

            return redirect()->route('interval.index')->with([
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id_interval;
        $interval = Interval::whereId($id)->first();

        if ($interval) {

            $interval->delete();

            if ($interval) {


                session()->flash('delete', 'interval Deleted successfully');

                return redirect()->route('interval.index')->with([
                    'message' => 'park Deleted successfully',
                    'alert-type' => 'success',
                ]);
            }
            session()->flash('error', 'interval Not Deleted');

            return redirect()->back()->with([
                'message' => 'Something was wrong',
                'alert-type' => 'danger',
            ]);
        }
    }
}
