<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Sale;

class ReportController extends Controller
{
    //
    public function index()
    {
        $sales = Sale::orderBy('id','desc')->Paginate(5);
        return view('reports.index',compact('sales'));
    }
}
