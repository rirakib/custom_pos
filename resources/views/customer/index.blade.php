@extends('master')
@section('title','Customer')
@section('content')

<div class="container mt-4 mb-5">
    <div class="row">
        <div class="col-md-10 mx-auto">
            <h1 class="text-center">Customer Database</h1>
        </div>
    </div>
</div>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-7">
            <h3>Customer Details</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">History</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($customers as $data)
                    <tr>
                        <th scope="row">{{$data->id}}</th>
                        <td>{{$data->name}}</td>
                        <td>{{$data->email}}</td>
                        <td>{{$data->number}}</td>
                        <td><a href="{{route('history.show',$data->id)}}" class="btn btn-warning">History</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="paginate">
            {!! $customers->links() !!}
            </div>
        </div>
        <div class="col-md-5">
            <div class="card p-3">
                <div class="card-title">
                    <h1>Create Customer</h1>
                </div>
                <div class="card-body">
                    <form action="{{route('customer.store')}}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="number" class="form-label">Number</label>
                            <input type="number" name="number" class="form-control" id="number">
                        </div>
                       
                        <button type="submit" id="customerStoreBtn" class="btn btn-primary">Create</button>
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