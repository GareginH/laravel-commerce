@extends('layouts.admin')
@section('content')  
    <div class="container ">
        <div class="row m-0 mt-3 justify-content-between">
            <div class="d-flex bg-color-white col-lg-3 p-0 mt-2 ml-1 mr-1">
                <div class="col" style="background:#8d6a9f;"><img src="{{asset('img/cart.png')}}" alt="" class="img-fluid"></div>
                <div class="col text-uppercase align-self-center text-center">Items sold <br><p class="font-weight-bolder">{{$itemsSold}}</p></div>
            </div>
            <div class="d-flex bg-color-white col-lg-3 p-0 mt-2 ml-1 mr-1">
                <div class="col" style="background:#8d6a9f;"><img src="{{asset('img/money.png')}}" alt="" class="img-fluid"></div>
                <div class="col text-uppercase align-self-center text-center">Money earned <br><p class="font-weight-bolder">${{$total}}</p></div>
            </div>
            <div class="d-flex bg-color-white col-lg-3 p-0 mt-2 ml-1 mr-1">
                <div class="col" style="background:#8d6a9f;"><img src="{{asset('img/customers.png')}}" alt="" class="img-fluid pt-1"></div>
                <div class="col text-uppercase align-self-center text-center">Users <br><p class="font-weight-bolder">{{$customers}}</p></div>
            </div>
        </div>
        <div class="mt-5">
            <div class="bg-color-white" style="border-radius:15px;">
                <h2>Latest Orders</h2>
                <div class="pb-4 pr-4 pl-4 order-list pt-0 order-bg-color">
                        <table class="col-lg-12 mt-3">
                            <tr class="text-uppercase">
                                <th>User</th>
                                <th>Date and time</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Sum</th>
                            </tr>
                            @foreach ($orders as $item)
                            <tr>
                                <td>{{$item->profile->user->name}}</td>
                                <td>{{$item->created_at}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->quantity}}</td>
                                <td>${{$item->quantity * $item->price}}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
        </div>
    </div>
@endsection
