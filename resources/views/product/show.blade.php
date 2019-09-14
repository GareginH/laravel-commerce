@extends('layouts.main')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-lg-6 col-sm-8">
            <div class="product-image img-fluid" style="background-image:url(/{{$product->Image}});">
            </div>
        </div>
        <div class="col-lg-6 col-sm-4">
            <h2 class="text-uppercase product-text">{{$product->Title}}</h2>
            <hr>
            <h5 class="product-text">${{$product->Price}}</h5>
            <h6 class="product-text">{{$product->Quantity}} remaining</h6>
            <add-to-cart product='{{$product->id}}'></add-to-cart>
            <hr>
            <h4 class="product-text">Description</h4>
            <h6 class="product-text">{{$product->Description}}</h6>
        </div>
    </div>
</div>

@endsection