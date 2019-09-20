@extends('layouts.main')
@section('content')

<div class="container" style="height:100vh">
    <div class="col-lg-12 mt-5">
        <div class="row justify-content-between p-0 m-0">
            <h2 class="text-uppercase">My Profile</h2>
            <h4 class="text-uppercase align-self-center">{{auth()->user()->name}}</h4>
        </div>
        
        <div class="row m-0 justify-content-between">
            <div class="d-flex bg-color-white col-lg-3 p-0 mt-2">
                <div class="col" style="background:#8d6a9f;"><img src="{{asset('img/cart.png')}}" alt="" class="img-fluid"></div>
                <div class="col text-uppercase align-self-center text-center">Items bought <br><p class="font-weight-bolder">{{$orders->sum('quantity')}}</p></div>
            </div>
            <div class="d-flex bg-color-white col-lg-3 p-0 mt-2">
                <div class="col" style="background:#8d6a9f;"><img src="{{asset('img/money.png')}}" alt="" class="img-fluid"></div>
                <div class="col text-uppercase align-self-center text-center">Money spent <br><p class="font-weight-bolder">${{$total}}</p></div>
            </div>
            <div class="d-flex bg-color-white col-lg-3 p-0 mt-2">
                <div class="col" style="background:#8d6a9f;"><img src="{{asset('img/bonus.png')}}" alt="" class="img-fluid"></div>
                <div class="col text-uppercase align-self-center text-center">Bonuses earned <br><p class="font-weight-bolder">${{$profile->bonus}}</p></div>
            </div>
        </div>
        <hr>
        <div class="bg-color-white">
                <div class="p-4 mt-3 text-center">        
                        <h5>Payment history</h5>
                        <small>Latest to oldest</small>
                    </div>
            
                    <div class="pb-4 pr-4 pl-4 order-list pt-0 order-bg-color">
                            <table class="col-lg-12 mt-3">
                                <tr class="text-uppercase">
                                    <th>Date and time</th>
                                    <th>Description</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                </tr>
                                @foreach ($orders as $item)
                                <tr>
                                    <td>{{$item->created_at}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>${{$item->price}}</td>
                                    <td>{{$item->quantity}}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
        </div>
        
    </div>
</div>
</div>
@endsection