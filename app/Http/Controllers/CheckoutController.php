<?php

namespace App\Http\Controllers;
use App\Profile;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request){
        $cart = $request->session()->get('Cart');
        
        if($cart == null){
            return "Cart is empty";
        }
        else{
            $total = 0;
            $items = array();
            foreach ($cart as $item) {
                if(!in_array($item, $items)){
                    array_push($items, $item);
                    $total += $item[0]->Price * $item[1];
                    auth()->user()->profile->orders()->create([
                        'name'=>$item[0]->Title,
                        'price'=>$item[0]->Price,
                        'quantity'=>$item[1],
                    ]);
                }
            }
            $prof = Profile::find(auth()->user()->id);
            $prof->bonus += round($total * 3 / 100);
            $prof->save();
        }
        $request->session()->put('Cart', null);
    }
}
