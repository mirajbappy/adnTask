<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
use App\Admin;
use Auth;

class CommonDataController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function customerList()
    {
        $customers = Customer::all();
        return view('customerList')->with('customers', $customers);
    }


    public function createAdmin()
    {
        $admins = Admin::where('user_type', 'admin')->get();
        return view('createAdmin')->with('admins', $admins);
    }

    public function storeAdmin(Request $request)
    {
       $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6',
            ]);

        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $newAdmin = new Admin;
        $newAdmin->name = $request->name;
        $newAdmin->email = $request->email;
        $newAdmin->password = bcrypt($request->password);
        $newAdmin->user_type = 'admin';
        $newAdmin->created_at = date('Y-m-d H:i:s');

        $newAdmin->save();
        return redirect()->back()->with('message', 'Created');
    }

    public function createManager()
    {
        return view('createManager');
    }


}
