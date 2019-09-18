@extends('layouts.main')
@section('content')

<div class="container" style="height:100vh">
    <div class="col-lg-12 mt-5">
        <div class="row m-0 justify-content-between">
            <div class="d-flex bg-color-white col-lg-3 p-0 mt-2 ml-1 mr-1">
                <div class="col" style="background:#8d6a9f;"><img src="{{asset('img/cart.png')}}" alt="" class="img-fluid"></div>
                <div class="col text-uppercase align-self-center text-center">Items bought <br><p class="font-weight-bolder">{{$orders->sum('quantity')}}</p></div>
            </div>
            <div class="d-flex bg-color-white col-lg-3 p-0 mt-2 ml-1 mr-1">
                <div class="col" style="background:#8d6a9f;"><img src="{{asset('img/money.png')}}" alt="" class="img-fluid"></div>
                <div class="col text-uppercase align-self-center text-center">Money spent <br><p class="font-weight-bolder">${{$total}}</p></div>
            </div>
            <div class="d-flex bg-color-white col-lg-3 p-0 mt-2 ml-1 mr-1">
                <div class="col" style="background:#8d6a9f;"><img src="{{asset('img/bonus.png')}}" alt="" class="img-fluid"></div>
                <div class="col text-uppercase align-self-center text-center">Bonuses earned <br><p class="font-weight-bolder">${{$profile->bonus}}</p></div>
            </div>
        </div>
        <div class="ml-1 mr-1 p-0 order-list mt-3">
                <h5>Order history</h5>
                <table class="col-lg-12">
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Date</th>
                    </tr>
                    @foreach ($orders as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>${{$item->price}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->created_at}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</div>
@endsection