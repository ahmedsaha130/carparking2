<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Custromer;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
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
    {       $customers = Customer::orderby('created_at','desc')->get();
    return view('customer.auth.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer.auth.create');

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
            'name'          => 'required',
            'email'         => 'required|email|max:255|unique:customers',
            'mobile'        => 'required|numeric|unique:customers',
            'status'        => 'required',
            'password'      => 'required|min:8|confirmed',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data['name']           = $request->name;
        $data['email']          = $request->email;
        $data['email_verified_at'] = Carbon::now();
        $data['mobile']         = $request->mobile;
        $data['password']       = bcrypt($request->password);
        $data['status']         = $request->status;
        $data['near']            = $request->near;

        if ($customer_image = $request->file('customer_image')) {
            $filename = Str::slug($request->name).'.'.$customer_image->getClientOriginalExtension();
            $path = public_path('files/assets/customer/'. $filename);
            Image::make($customer_image->getRealPath())->resize(300, 300, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $data['customer_image']  = $filename;
        }

        $customer = Customer::create($data);

        if ($customer){


        session()->flash('add', 'Customer Created successfully');

        return redirect()->route('customer.index')->with([
            'message' => 'Customer Created successfully',
            'alert-type' => 'success',
        ]);
        }
        session()->flash('error', 'Customer Created successfully');

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
        $customer = Customer::find($id);
        $reservations = Reservation::where('customer_id',$id)->with(['intervals','parks'])->withTrashed()->get();
        return  view('customer.auth.show',compact('customer','reservations'));
    }
    public function Print($id)
    {
        $customer = Customer::find($id)->first();


        return view('customer.auth.show',compact('customer'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $customer = Customer::find($id);

       return view('customer.auth.edit',compact('customer'));
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
            'name'          => 'required',
            'email'         => 'required|email|max:255|unique:customers,email,'.$id,
            'mobile'        => 'required|numeric|unique:customers,mobile,'.$id,
            'status'        => 'required',
            'password'      => 'nullable|min:8',
        ]);
        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer = Customer::whereId($id)->first();

        if ($customer) {
            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['mobile'] = $request->mobile;
            if (trim($request->password) != '') {
                $data['password'] = bcrypt($request->password);
            }
            $data['status'] = $request->status;
            $data['near'] = $request->near;

            if ($customer_image = $request->file('customer_image')) {
                if ($customer->customer_image != '') {
                    if (File::exists('files/assets/customer/' . $customer->customer_image)) {
                        unlink('files/assets/customer/' . $customer->customer_image);
                    }
                }
                $filename = Str::slug($request->name) . '.' . $customer_image->getClientOriginalExtension();
                $path = public_path('files/assets/customer/' . $filename);
                Image::make($customer_image->getRealPath())->resize(300, 300, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($path, 100);
                $data['customer_image'] = $filename;
            }

            $customer->update($data);

            if ($customer) {


                session()->flash('edit', 'Customer Updated successfully');

                return redirect()->route('customer.index')->with([
                    'message' => 'Customer Updated successfully',
                    'alert-type' => 'success',
                ]);
            }
            session()->flash('error', 'Customer  Not Updated !!');

            return redirect()->back()->with([
                'message' => 'Something was wrong',
                'alert-type' => 'danger',
            ]);
           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id_customer ;
        $customer = Customer::whereId($id)->first();

        $id_operation = $request->id_operation ;

        if ($id_operation == 1){

            if ($customer) {
                if ($customer->customer_image != '') {
                    if (File::exists('files/assets/customer/' . $customer->customer_image)) {
                        unlink('files/assets/customer/' . $customer->customer_image);
                    }
                }
                $customer->forceDelete();

                if ($customer) {



                    session()->flash('delete', 'Customer Deleted successfully');

                    return redirect()->route('customer.index')->with([
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

        }else {


                if ($customer) {

                    $customer->delete();

                    session()->flash('archive', 'The Customer has been successfully moved to the archive');

                    return redirect()->route('customer.index')->with([
                        'message' => 'The Customer has been successfully moved to the archive',
                        'alert-type' => 'success',
                    ]);
                }
                session()->flash('error', 'Something was wrong');

                return redirect()->back()->with([
                    'message' => 'Something was wrong2',
                    'alert-type' => 'danger',
                ]);
            }



    }

    public function active_customer(){

        $customers = Customer::where('status','1')->orderby('created_at','desc')->get();
        return view('customer.active_customer.index',compact('customers'));
    } public function disactive_customer(){

        $customers = Customer::where('status','0')->orderby('created_at','desc')->get();
        return view('customer.disactive_customer.index',compact('customers'));
    }

    public function remove_image(Request $request)
    {


        $customer = Customer::whereId($request->customer_id)->first();
        if ($customer) {
            if (File::exists('files/assets/customer/' . $customer->customer_image)) {
                unlink('files/assets/customer/' . $customer->customer_image);
            }
            $customer->customer_image = null;
            $customer->save();
            return 'true';
        }
        return 'false';
    }
}
