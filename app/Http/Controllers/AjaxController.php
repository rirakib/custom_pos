<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class AjaxController extends Controller
{
    //
    public function index()
    {
        $customers = Customer::orderBy('name','asc')->paginate(5);
        return view('customer.index',compact('customers'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        Customer::create($data);
        return redirect()->back()->with('store','Customer has been created');
    }
}
