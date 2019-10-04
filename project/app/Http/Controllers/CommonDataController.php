<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Customer;
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
        return view('createAdmin');
    }

    public function createManager()
    {
        return view('createManager');
    }


}
