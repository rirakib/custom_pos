<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Sale;


class HistoryController extends Controller
{
    //
    public function show($id)
    {                       
        $customer_history = Sale::where('customer_id',$id)->paginate(5);
        return view('history.history',compact('customer_history'));
    }
}
