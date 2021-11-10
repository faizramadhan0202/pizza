@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                    <div class="card-body">
                        @if (session('massage'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('massage') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if (session('errmassage'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('errmassage') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        <ul class="list-group-item">
                            @if(Auth::check())
                                <form action="{{ route('order.store') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-group">
                                            <p>Name: {{ auth()->user()->name }}</p>
                                            <p>Email: {{ auth()->user()->email }}</p>
                                            <p>Phone: <input type="text" class="form-control" name="phone"></p>
                                            <p>Small Pizza : <input type="number" class="form-control" name="small_pizza"></p>
                                            <p>medium Pizza : <input type="number" class="form-control" name="medium_pizza"></p>
                                            <p>large Pizza : <input type="number" class="form-control" name="large_pizza"></p>
                                            <p><input type="hidden" name="pizza_id" value="{{ $pizza->id }}"></p>
                                            <p><input type="date" name="date" class="form-cotrol" required></p>
                                            <p><input type="time" name="time" class="form-control" required></p>
                                            <textarea name="body"></textarea>
                                            <p>
                                                <button type="submit" class="btn btn-success">
                                                    Make Order
                                                </button>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <p><a href="{{ route('login') }}">Please Login</a></p>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu</div>
                    <div class="card-body">
                        <div class="row">

                                <div class="col-md-4 mt-2 text-center" style="border: 1px solid #eee">
                                    <img src="{{ Storage::url($pizza->image) }}" class="img-thumbnail" style="width: 100%">
                                    <p><h3>{{ $pizza->name }}</h3></p>
                                    <p>{{ $pizza->description }}</></p>
                                    <p>small Pizza:{{ $pizza->small_pizza_price }}</></p>
                                    <p>medium Pizza:{{ $pizza->medium_pizza_price }}</></p>
                                    <p>Large Pizza:{{ $pizza->large_pizza_price }}</></p>
                                </div>
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
