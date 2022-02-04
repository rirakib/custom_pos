@extends('master')
@section('title','Print')
@section('content')


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-7 mx-auto">
                <div class="card">
                    <div class="card-title">
                        <h2 class="text-center pt-2">ABC Company</h2>
                        <p class="text-center">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Odit, cum!</p>
                    </div>
                    <div class="card-body">
                        <h4 class="text-warning">Sales ID : <span class="ml-3 text-dark">{{$sales->id}}</span> </h4>
                        <h4 class="text-warning">Customer Name : <span class="ml-3 text-dark">{{$sales->customer->name}}</span> </h4>
                        <h4 class="text-warning">Product Name : <span class="ml-3 text-dark">{{$sales->product->name}}</span> </h4>
                        <h4 class="text-warning">Quantity : <span class="ml-3 text-dark">{{$sales->quantity}}</span> </h4>
                        <h4 class="text-warning">Paid Ammount : <span class="ml-3 text-dark">{{$sales->paid_ammount}}</span> </h4>
                        <h4 class="text-warning">Due Ammount : <span class="ml-3 text-dark">{{$sales->target_ammount - $sales->paid_ammount}}</span> </h4>
                        <h4 class="text-warning">Sales Date : <span class="ml-3 text-dark">{{\Carbon\Carbon::parse($sales->created_at)->format('d/m/Y')}}</span> </h4>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <span>Signature</span>
                        <span><a href="" class="btn btn-danger">Print</a></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection