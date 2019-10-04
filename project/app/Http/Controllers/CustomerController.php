<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use Auth;

class CustomerController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('customer');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('customer.dashboard');
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
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'extension' => 'mimes:jpg,png,pdf,docs,xlxs,pptx',
            ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer = Customer::find(Auth::guard('customer')->user()->id);
        $customer->name = $request->name;

        if(!empty($request->file('file')))
        {
            $doc_file = $request->file('file');
            $base_name = preg_replace('/\..+$/', '', $doc_file->getClientOriginalName());
            $base_name = explode(' ', $base_name);
            $base_name = implode('-', $base_name);
            $file_name = $base_name."-".uniqid().".".$doc_file->getClientOriginalExtension();
            $file_path = 'uploads/customer/'.Auth::guard('customer')->user()->id;

            if (!file_exists($file_path))  
            {
                mkdir($file_path, 0777, true);
            }

            $doc_file->move($file_path.'/', $file_name);
            $customer->file = $file_name;
        }


        $customer->save();
        return redirect()->back()->with('message', 'Updated');

    }


    // preview customer
    public function preview(){
        $customer = Customer::find(Auth::guard('customer')->user()->id);

        return response()->json($customer);
    }

    // preview customer
    public function deleteFile(){
        $customer = Customer::find(Auth::guard('customer')->user()->id);

        if(!empty($customer->file)){
            $file_path = 'uploads/customer/'.Auth::guard('customer')->user()->id.'/'.$customer->file;
            if (!file_exists(asset($file_path)))  
            {
                unlink($file_path);
            }
            $customer->file = null;
            $customer->update();
            return redirect()->back()->with('message', 'File Deleted');
        }else{
            return redirect()->back()->with('message', 'File Not Found');
        }

    }


}
