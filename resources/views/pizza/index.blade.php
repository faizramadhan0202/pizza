@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{ route('front') }}" class="list-group-item list-group-item-action">Home</a>
                        <a href="{{ route('pizza.index') }}" class="list-group-item list-group-item-action">View</a>
                        <a href="{{ route('pizza.create') }}" class="list-group-item list-group-item-action">Create</a>
                        <a href="{{ route('user.order') }}" class="list-group-item list-group-item-action">User Order</a>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">List Of Pizza</div>
                <a href="{{ route('pizza.create') }}"><button type="button" class="btn btn-success ml-2 mt-2">Add Pizza</button></a>
                <div class="card-body">
                    @if (session('massage'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('massage') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table table-striped table-hover table-responsive text-center">
                        <thead>
                          <tr>
                            <th scope="col">No</th>
                            <th scope="col">Name</th>
                            <th scope="col">Image</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">S.Price</th>
                            <th scope="col">M.Price</th>
                            <th scope="col">L.Price</th>
                            <th scope="col">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @if (count($pizzas)>0)
                              @foreach ($pizzas as $pizza)
                                @php
                                    $i++;
                                @endphp
                                <tr>
                                    <th>{{ $i }}</th>
                                    <td>{{ $pizza->name }}</td>
                                    <td><img src="{{ Storage::url($pizza->image) }}" alt="" width="80px"></td>
                                    <td>{{ $pizza->description }}</td>
                                    <td>{{ $pizza->category }}</td>
                                    <td>{{ $pizza->small_pizza_price }}</td>
                                    <td>{{ $pizza->medium_pizza_price }}</td>
                                    <td>{{ $pizza->large_pizza_price }}</td>
                                    <td>
                                        <a href="{{ route('pizza.edit', $pizza->id) }}"><button class="btn btn-primary">Edit</button></a>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#exampleModal{{ $pizza->id }}" >Delete</button>
                                    </td>
                                    <div class="modal fade" id="exampleModal{{ $pizza->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <form action="{{ route('pizza.destroy', $pizza->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are You Delete ?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">Dlete</button>
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </tr>
                              @endforeach
                              @else
                                <h4>No Data Pizza</h4>
                              @endif
                        </tbody>
                      </table>
                      {{ $pizzas->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
