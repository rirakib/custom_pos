@extends('master')
@section('title','Sale')
@section('content')

<div class="container mt-4 mb-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h1 class="text-center">Sale Database</h1>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-7">
            <h3>Sale Details</h3>
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
                    @foreach($sales as $data)
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
                   <tr>
                       @php
                        $tar_ammount = 0;
                        $paid_ammount = 0;
                            foreach($sales as $sale){
                                $tar_ammount += $sale->target_ammount;
                                $paid_ammount += $sale->paid_ammount;
                            }
                           
                            

                       @endphp
                       

                        <td colspan="4">total Target: @php echo $tar_ammount @endphp</td>
                    </tr>
                    <tr>    
                        <td colspan="4">total Paid: @php echo $paid_ammount @endphp</td>
                    </tr>
                    <tr>    
                        <td colspan="4">total Due: @php echo $tar_ammount - $paid_ammount  @endphp</td>
                    </tr>
                </tbody>
            </table>
            <div class="paginate">
                {!! $sales->links() !!}
            </div>
        </div>
        <div class="col-md-5">
            <div class="card p-3">
                <div class="card-title">
                    <h1>Sale Product</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('sale.store')}}" method="post">
                        @csrf
                        <div class="input-group mb-3">
                            <label class="input-group-text" for="product_id">Product Name</label>
                            <select class="form-select" name="product_id" id="product_id">
                                <option selected>Choose...</option>
                                @foreach(DB::table('products')->orderBy('name','asc')->get() as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="quantity">
                        </div>

                        <div class="input-group mb-3">
                            <label class="input-group-text" for="customer_id">Customer Name</label>
                            <select class="form-select" name="customer_id" id="customer_id">
                                <option selected>Choose...</option>
                                @foreach(DB::table('customers')->orderBy('name','asc')->get() as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <label for="target_ammount" class="form-label">Target Ammount</label>
                            <input type="number" name="target_ammount" class="form-control" id="target_ammount">
                        </div>

                        <div class="mb-3">
                            <label for="paid_ammount" class="form-label">Paid Ammount</label>
                            <input type="number" name="paid_ammount" class="form-control" id="paid_ammount">
                        </div>


                        <button type="submit" class="btn btn-primary">Sale</button>
                    </form>
                </div>
                @if(session('store'))
                <div class="card-footer">
                    <h3 class="text-success">{{session('store')}}</h3>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection