@extends('layouts.admin')
@section('content')
<div class="col-8 dash-content">
    <div class="container">
            <form action="/admin/products" enctype="multipart/form-data" method="post" >
            @csrf
            <div class="row">
                <h1>Add New Product</h1>
            </div>
            <div class="row">
                <label for="image" class="col-md-4 col-form-label">Product Image</label>

                <input type="file" class="form-control-file" id="image" name="image">

                @if ($errors->has('image'))
                    <strong>{{ $errors->first('image') }}</strong>
                @endif
            </div>
            <div class="form-group row">
                <label for="title" class="col-form-label">Product Title</label>

                <input id="title"
                        type="text"
                        class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                        name="title"
                        autocomplete="title" autofocus>

                @if ($errors->has('title'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('title') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group row">
                    <label for="description" class="col-form-label">Product Description</label>
                    <textarea id="description"
                            type="text"
                            class="form-control{{ $errors->has("description") ? ' is-invalid' : '' }}"
                            name="description"
                            autocomplete="description" autofocus>
                    </textarea>
                    @if ($errors->has("description"))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first("description") }}</strong>
                        </span>
                    @endif
            </div>

            <div class="form-group row">
                    <label for="category" class="col-form-label">Product Category</label>
                    <div class="d-flex">
                    @foreach($categories as $item)
                    <div class="col">
                        {{$item->name}}
                        <input id="category"
                        type="radio"
                        class="form-control{{ $errors->has("category") ? ' is-invalid' : '' }}"
                        name="category"
                        value="{{$item->name}}">
                    </div>
                    @endforeach
                    </div>
                    

                    @if ($errors->has("category"))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first("category") }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group row">
                    <label for="price" class="col-form-label">Product Price</label>

                    <input id="price"
                            type="text"
                            class="form-control{{ $errors->has("price") ? ' is-invalid' : '' }}"
                            name="price"
                            autocomplete="price" autofocus>

                    @if ($errors->has("price"))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first("price") }}</strong>
                        </span>
                    @endif
            </div>
            <div class="form-group row">
                    <label for="quantity" class="col-form-label">Product Quantity</label>

                    <input id="quantity"
                            type="text"
                            class="form-control{{ $errors->has("quantity") ? ' is-invalid' : '' }}"
                            name="quantity"
                            autocomplete="quantity" autofocus>

                    @if ($errors->has("quantity"))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first("quantity") }}</strong>
                        </span>
                    @endif
            </div>
            <div class="row pt-4">
                <button class="btn btn-outline-dark col">Add</button>
            </div>
        </form>
    </div>
</div>
@endsection