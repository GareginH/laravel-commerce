@extends('layouts.admin')
@section('content')  
    <div class="col">
        <div class="row m-0 mt-3 justify-content-center">
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
                    <div class="col text-uppercase align-self-center text-center">Customers <br><p class="font-weight-bolder">{{$customers}}</p></div>
                </div>
            </div>
    </div>
@endsection
