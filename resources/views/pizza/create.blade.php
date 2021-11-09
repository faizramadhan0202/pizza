@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="card-body">
                    <ul class="list-group">
                        <a href="{{ route('pizza.index') }}" class="list-group-item list-group-item-action">View</a>
                        <a href="{{ route('pizza.create') }}" class="list-group-item list-group-item-action">Create</a>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pizza</div>
                {{-- @if (count($errors)>0)
                <div class="alert alert-danger">
                    @foreach ( $errors->all() as $error )
                      <p>{{ $error }}</p>
                    @endforeach
                </div>
                @endif --}}

                <form action="{{ route('pizza.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name Of Pizza</label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name"  placeholder="name of pizza" autocomplete="off">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description Of Pizza</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-inline">
                        <label for="price" class="mr-2">Pizza Price </label>
                        <input type="number" class="form-control @error('small_pizza_price') is-invalid @enderror" name="small_pizza_price"  placeholder="Small Pizza">
                        @error('small_pizza_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="number" class="form-control  @error('medium_pizza_price') is-invalid @enderror" name="medium_pizza_price" placeholder="Medium Pizza">
                        @error('medium_pizza_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="number" class="form-control  @error('large_pizza_price') is-invalid @enderror" name="large_pizza_price" placeholder="large Pizza">
                        @error('large_pizza_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mt-2">
                        <label for="category">Category</label>
                        <div class="input-group mb-3">
                            <select class="form-control @error('category') is-invalid @enderror" name="category">
                              <option value="">Choose...</option>
                              <option value="vegetarian">Vegetarian</option>
                              <option value="nonvegetarian">Non Vegetarian</option>
                              <option value="traditional">Traditional</option>
                            </select>
                            @error('category')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-xm btn-block">Save</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
