@extends('master')
@section('title','History')
@section('content')

<div class="container mt-4 mb-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h1 class="text-center">History</h1>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h3>Customer History</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Target</th>
                        <th scope="col">Paid</th>
                        <th scope="col">Due</th>
                        <th scope="col">Date</th>
                        <th>Print</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customer_history as $data)
                    <tr>
                        <th scope="row">{{$data->id}}</th>
                        <td>{{$data->product->name}}</td>
                        <td>{{$data->customer->name}}</td>
                        <td>{{$data->customer->number}}</td>
                        <td>{{$data->quantity}}</td>
                        <td>{{$data->target_ammount}}</td>
                        <td>{{$data->paid_ammount}}</td>
                        <td>{{$data->target_ammount - $data->paid_ammount }}</td>
                        <td>{{\Carbon\Carbon::parse($data->created_at)->format('d/m/Y')}}</td>
                        <td><a href="{{route('sale.show',$data->id)}}" class="btn btn-success">Print</a></td>
                    </tr>
                   @endforeach
                   
                </tbody>
            </table>
            <div class="paginate">
                {!! $customer_history->links() !!}
            </div>
        </div>
    </div>
</div>

@endsection