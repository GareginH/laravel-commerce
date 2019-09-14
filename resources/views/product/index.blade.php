@extends('layouts.admin')
@section('content')
<div class="col-8 dash-content pt-3 ">
    <div class="row">
        @foreach ($products as $item)
        <div class="col-3 mb-3">
            <a href="{{route('admin.product.edit', $item->id)}}">
                <div class="product-card">
                    <div class="product-card-name">
                        {{$item->Title}}
                    </div>
                    <div class="product-card-img" style="background-image:url(/{{$item->Image}})">
                        
                    </div>
                    <div class="product-card-info d-flex justify-content-between">
                        <span class="p-1">Price: ${{$item->Price}}</span>
                        <span class="p-1">Stock: {{$item->Quantity}}</span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

</div>

@endsection