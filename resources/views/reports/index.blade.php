@extends('master')
@section('title','Reports')
@section('content')

<div class="container mt-4 mb-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h1 class="text-center">Report Database</h1>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-11 mx-auto">
            <h3>Report Details</h3>
            <table class="table">
                <thead>
                    
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Unit Price</th>
                        <th scope="col">Unit Cost</th>
                        <th scope="col">Unit Sell</th>
                        <th scope="col">Profit</th>
                        <th scope="col">Date</th>
                        <th>Print</th>
                    </tr>
                   
                </thead>
                <tbody>
                @foreach($sales as $data)
                    <tr>
                        <th scope="row">{{$data->id}}</th>
                        <td>{{$data->customer->name}}</td>
                        <td>{{$data->customer->number}}</td>
                        <td>{{$data->product->name}}</td>
                        <td>{{$data->product->price}}</td>
                        @php
                            $unit_cost = $data->product->cost / $data->product->quantity;
                        @endphp
                        <td>@php echo floor($unit_cost) @endphp</td>
                        
                        <td>{{$data->target_ammount / $data->quantity}}</td>
                        @php
                            $price = $data->product->price;
                            $cost = $data->product->cost / $data->product->quantity;
                            $sell = $data->target_ammount / $data->quantity;
                            $total_grand = $price + $cost ;
                            $profit = $sell - $total_grand;
                        @endphp
                        <td>@php echo floor($profit) @endphp</td>
                        <td>{{\Carbon\Carbon::parse($data->created_at)->format('d/m/Y')}}</td>
                        <td><a href="" class="btn btn-success">Print</a></td>
                    </tr>
                    @endforeach

                    @php
                        $total_profit = 0;
                        foreach($sales as $data){
                            $price = $data->product->price;
                            $cost = $data->product->cost / $data->product->quantity;
                            $sell = $data->target_ammount / $data->quantity;
                            $total_grand = $price + $cost ;
                            $profit = $sell - $total_grand;
                            $total_profit += $profit ;
                        }
                    @endphp
                    <tr>
                    <td colspan="4">Total Profit: @php echo floor($total_profit) @endphp</td>

                    </tr>
                   
                    
                </tbody>
            </table>
            <div class="paginate">
                {!! $sales->links() !!}
            </div>
        </div>
        
    </div>
</div>

@endsection