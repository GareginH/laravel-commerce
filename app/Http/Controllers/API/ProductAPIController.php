<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Image;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index', compact('products'));
    }
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shop(Request $request)
    {
        $products = Product::all();
        return view('shop.index', compact('products'));
    }
    public function vueShop(Request $request)
    {
        if($request->Title != null){
            $products = Product::where('Title', 'Like', '%'.$request->Title.'%')->get();
            return response()->json($products->all());
        }
        else if($request->Title != " ")
        {
            $products = Product::where('Title', 'Like', '%'.$request->Title.'%')->simplePaginate(4);
            return response()->json($products);
        }
        
    }
}
