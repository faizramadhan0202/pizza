@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Customers</div>
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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Member Since</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($customers as $customer)
                          <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($customer->created_at)->format('d M Y') }}</td>
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
