@extends('layouts.main')
@section('content')

<div class="container" style="color:#8d6a9f;">
    <div class=" card-body mb-5 pb-5" style="background: #fff;">
        <h2 class="mt-5 mb-3">Checkout</h2>
        <?php $total = 0; ?>
        <div class="row">
            @foreach ($items as $item)
            <div class="col-6 d-flex pt-2">
                <div class="col-4 product-checkout-img" style="background-image:url({{$item[0]->Image}});">
                </div>
                <div class="col-6">
                    {{$item[0]->Title}}
                </div>
                <div class="col-2 d-flex flex-column">
                    <div class="col-6">
                        ${{$item[0]->Price}}
                    </div>
                    <div class="col-6">
                        x{{$item[1]}}
                    </div>
                </div>
            </div>
            
            <?php $total += $item[1]*$item[0]->Price;  ?>
            
            @endforeach
        </div>
        <div class=" float-right">Subtotal: ${{$total}}</div>
    </div>
 
    <div class="mt-5">
        <checkout-page></checkout-page>
    </div>
    
</div>

@endsection