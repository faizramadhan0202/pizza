@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
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
                            <div class="col-md-5">
                                <p>Name</p>
                                <p>Description</p>
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
