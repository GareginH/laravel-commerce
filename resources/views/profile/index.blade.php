@extends('layouts.main')
@section('content')

<div class="row p-0 m-0 justify-content-between" style="height:100vh">
    <div class="col-lg-2 bg-color-white" style="background:#8d6a9f;">
        <img src="{{asset('img/cart.png')}}" alt="" class="img-fluid">
        <p style="color:#fff; padding-top:20px;">{{auth()->user()->name}}</p>
        <br>
        <a href="" class="btn btn-outline-light">
            Edit Profile
        </a>
    </div>
    <div class="col-lg-9 mt-5">
        <div class="row m-0">
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
                <div class="col text-uppercase align-self-center text-center">Bonus earned <br><p class="font-weight-bolder">${{$profile->bonus}}!</p></div>
            </div>
        </div>
        <div class="ml-1 mr-1 p-0">
                <h5>Order history</h5>
                @foreach ($orders as $item)
                <div>
                    <div>{{$item->name}}</div>
                    <div>${{$item->price}}</div>
                    <div>x{{$item->quantity}}</div>
                    <div>{{$item->created_at}}</div>
                </div>
                @endforeach
        </div>
    </div>
</div>
</div>
@endsection