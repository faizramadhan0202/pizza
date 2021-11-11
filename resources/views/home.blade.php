@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Order Pizza</div>
                <div class="card-body">
                    <table class="table table-striped table-hover text-center">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">User</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date</th>
                            <th scope="col">Pizza</th>
                            <th scope="col">Small Pizza</th>
                            <th scope="col">Medium Pizza</th>
                            <th scope="col">Large Pizza</th>
                            <th scope="col">Total($)</th>
                            <th scope="col">Massage</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->user->name }} <br>{{ $order->phone }}</td>
                            <td>{{ $order->user->email }}</td>
                            <td>{{ $order->date }}</td>
                            <td>{{ $order->pizza->name }}</td>
                            <td>{{
                                    ($order->pizza->small_pizza_price * $order->small_pizza) +
                                    ($order->pizza->medium_pizza_price * $order->medium_pizza) +
                                    ($order->pizza->large_pizza_price * $order->large_pizza)
                                }}
                            </td>
                            <td>{{ $order->small_pizza }}</td>
                            <td>{{ $order->medium_pizza }}</td>
                            <td>{{ $order->large_pizza }}</td>
                            <td>{{ $order->body }}</td>
                            <td>{{ $order->status }}</td>
                        </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    a.list-group-item  {
        font-size: 17;
    }
    a.list-group-item:hover {
        background-color: red;
        color: #fff;
    }
    .card-header {
        background-color: red;
        color: #fff;
        font-size: 20px;
    }
</style>
@endsection
