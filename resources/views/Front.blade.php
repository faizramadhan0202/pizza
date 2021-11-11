@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('front') }}" style="text-decoration: none; color:white;">Dashboard</a>
                </div>
                    <div class="card-body">
                        <ul class="list-group-item">
                            <a href="" class="list-group-item list-group-item-action">Category</a>
                            <a href="" class="list-group-item list-group-item-action">Category</a>
                            <a href="" class="list-group-item list-group-item-action">Category</a>
                            <a href="" class="list-group-item list-group-item-action">Category</a>
                            <a href="" class="list-group-item list-group-item-action">Category</a>
                        </ul>
                    </div>
                </div>
            </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu</div>
                    <div class="card-body">
                        <div class="row">
                            @forelse ( $pizzas as $pizza )
                                <div class="col-md-4 mt-2" style="border: 1px solid #eee">
                                    <img src="{{ Storage::url($pizza->image) }}" class="img-thumbnail" style="width: 100%">
                                    <p>{{ $pizza->name }}</p>
                                    <p>{{ $pizza->description }}</p>
                                    <a href="{{ route('pizza.show', $pizza->id) }}">
                                        <button class="btn btn-primary mb-2">Order Now</button>
                                    </a>
                                </div>
                            @empty
                                <p>No Data Pizza</p>
                            @endforelse


                        </div>
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
