<?php

namespace App\Http\Controllers\BackendAdmin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArchiveCustomers extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::onlyTrashed()->get();

        return view('customer.archive.index',compact('customers'));
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
    public function update(Request $request)
    {


        $customer = Customer::withTrashed()->find($request->id_customer)->restore();


        if ($customer) {


            session()->flash('archive_update', 'Customer Restored successfully');

            return redirect()->route('customer_archive.index')->with([
                'message' => 'Customer Updated successfully',
                'alert-type' => 'success',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request  $request )
    {

        $id = $request->id_customer ;
        $customer = Customer::whereId($id)->first();
        if ($customer) {
            if ($customer->customer_image != '') {
                if (File::exists('files/assets/customer/' . $customer->customer_image)) {
                    unlink('files/assets/customer/' . $customer->customer_image);
                }
            }
            $customer->forceDelete();

            if ($customer) {



                session()->flash('delete', 'Customer Deleted successfully');

                return redirect()->route('customer_archive.index')->with([
                    'message' => 'Customer Deleted successfully',
                    'alert-type' => 'success',
                ]);
            }
            session()->flash('error', 'Customer Not Deleted');

            return redirect()->back()->with([
                'message' => 'Something was wrong1',
                'alert-type' => 'danger',
            ]);
        }
    }
}
