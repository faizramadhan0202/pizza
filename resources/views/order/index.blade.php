@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Order Pizza</div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('pizza.index') }}" style="text-decoration: none">View</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('pizza.create') }}" style="text-decoration: none">Create</a></li>
                        </ol>
                    </nav>
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
                            <th scope="col">Massage</th>
                            <th scope="col">Status</th>
                            <th scope="col">Accept</th>
                            <th scope="col">Pending</th>
                            <th scope="col">Reject</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($orders as $order)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->user->email }}</td>
                            <td>{{ $order->date }}</td>
                            <td>{{ $order->pizza->name }}</td>
                            <td>{{ $order->small_pizza }}</td>
                            <td>{{ $order->medium_pizza }}</td>
                            <td>{{ $order->large_pizza }}</td>
                            <td>{{ $order->body }}</td>
                            <td>{{ $order->status }}</td>
                            <form action="{{ route('order.status', $order->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <td>
                                    <input type="submit" value="accepted" name="status" class="btn btn-primary btn-sm">
                                </td>
                                <td>
                                    <input type="submit" value="pending" name="status" class="btn btn-warning btn-sm">
                                </td>
                                <td>
                                    <input type="submit" value="rejected" name="status" class="btn btn-danger btn-sm">
                                </td>
                            </form>
                        </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
