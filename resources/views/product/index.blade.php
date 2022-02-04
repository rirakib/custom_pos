@extends('master')
@section('title','Product')
@section('content')

<div class="container mt-4 mb-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h1 class="text-center">Product Database</h1>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-7">
            <h3>Product Details</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Cost</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">alert Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $data)
                    <tr>
                        <th scope="row">{{$data->id}}</th>
                        <td>{{$data->name}}</td>
                        <td>{{$data->price}}</td>
                        <td>{{$data->cost}}</td>
                        <td>{{$data->quantity}}</td>
                        <td>{{$data->alert_quantity}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="paginate">
            {!! $products->links() !!}
            </div>
        </div>
        <div class="col-md-5">
            <div class="card p-3">
                <div class="card-title">
                    <h1>Create Product</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('product.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input type="number" name="quantity" class="form-control" id="quantity">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" id="price">
                        </div>
                        <div class="mb-3">
                            <label for="cost" class="form-label">Cost</label>
                            <input type="number" name="cost" class="form-control" id="cost">
                        </div>
                        <div class="mb-3">
                            <label for="alert_quantity" class="form-label">Alert Quantity</label>
                            <input type="number" name="alert_quantity" class="form-control" id="alert_quantity">
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Create</button>
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