<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $cart = request()->session()->get('Cart');
        
        if($cart == null){
            return "Cart is empty";
        }
        else{
            $items = array();
            foreach ($cart as $item) {
                if(!in_array($item, $items)){
                    array_push($items, $item);
                }
            }
            
        }

        return view('checkout.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $prod = Product::find($request->product);
        if($request->Qt > $prod->Quantity){
            return "Not enough stock";
        }
        $cart = $request->session()->get('Cart');
        if($cart === null || empty($cart)){
            $cart = array(array($prod, $request->Qt));
        }
        else{
            foreach ($cart as $item) {
                if($item[0] != $prod){
                    array_push($cart, array($prod, $request->Qt));
                }
                else{
                    return "Already in cart";
                }
            }
        }
        //$prod->Quantity -= $request->Qt;
        //$prod->save();

        $request->session()->put('Cart', $cart);
        return $request->session()->get('Cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {   
        
        $cart = $request->session()->get('Cart');
        
        if($cart == null){
            return "Cart is empty";
        }
        else{
            $items = array();
            foreach ($cart as $item) {
                if(!in_array($item, $items)){
                    array_push($items, $item);
                }
            }
            
        }
        return $items;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $cart = $request->session()->get('Cart');
        if($cart === null){
            return "Cart is empty";
        }
        else{
            foreach ($cart as $key=>$value) {
                if($value[0]->id == $id){
                    unset($cart[$key]);
                    $request->session()->put('Cart', null);
                }
            }  
        }
        $request->session()->put('Cart', $cart);
        return $request->session()->get('Cart');
    }
}
