@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('massage'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('massage') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card">
                <div class="card-header">Edit Pizza</div>
                <form action="{{ route('pizza.update', $pizza->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Name Of Pizza</label>
                        <input type="text" class="form-control  @error('name') is-invalid @enderror" name="name" autocomplete="off" value="{{ $pizza->name }}">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Description Of Pizza</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description">{{ $pizza->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-inline">
                        <label for="price" class="mr-2">Pizza Price </label>
                        <input type="number" class="form-control @error('small_pizza_price') is-invalid @enderror" name="small_pizza_price"  placeholder="Small Pizza" value="{{ $pizza->small_pizza_price }}" >
                        @error('small_pizza_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="number" class="form-control  @error('medium_pizza_price') is-invalid @enderror" name="medium_pizza_price" placeholder="Medium Pizza" value="{{ $pizza->medium_pizza_price }}">
                        @error('medium_pizza_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <input type="number" class="form-control  @error('large_pizza_price') is-invalid @enderror" name="large_pizza_price" placeholder="large Pizza" value="{{ $pizza->large_pizza_price }}">
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
                              <option value="">{{ $pizza->category }}</option>
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
                        <label for="image"></label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
                        <img src="{{ Storage::url($pizza->image) }}" width="120px" alt="">
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
